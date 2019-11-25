<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\NewCategoryRepositoryInterface;
use App\Http\Requests\Admin\NewCategoryRequest;
use App\Http\Requests\PaginationRequest;

class NewCategoryController extends Controller
{
    /** @var  \App\Repositories\NewCategoryRepositoryInterface */
    protected $newCategoryRepository;

    public function __construct(
        NewCategoryRepositoryInterface $newCategoryRepository
    ) {
        $this->newCategoryRepository = $newCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param    \App\Http\Requests\PaginationRequest $request
     * @return  \Response
     */
    public function index(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = action('Admin\NewCategoryController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->newCategoryRepository->countByFilter($filter);
        $newCategories = $this->newCategoryRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.new-categories.index',
            [
                'newCategories'    => $newCategories,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Response
     */
    public function create()
    {
        return view(
            'pages.admin.' . config('view.admin') . '.new-categories.edit',
            [
                'isNew'     => true,
                'newCategory' => $this->newCategoryRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(NewCategoryRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                            'slug',
                            'meta_title',
                            'meta_description',
                            'order',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $newCategory = $this->newCategoryRepository->create($input);

        if( empty($newCategory) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\NewCategoryController@index')
            ->with('message-success', trans('admin.messages.general.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param    int $id
     * @return  \Response
     */
    public function show($id)
    {
        $newCategory = $this->newCategoryRepository->find($id);
        if( empty($newCategory) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.new-categories.edit',
            [
                'isNew' => false,
                'newCategory' => $newCategory,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int $id
     * @return  \Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    int $id
     * @param            $request
     * @return  \Response
     */
    public function update($id, NewCategoryRequest $request)
    {
        /** @var  \App\Models\NewCategory $newCategory */
        $newCategory = $this->newCategoryRepository->find($id);
        if( empty($newCategory) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                            'slug',
                            'meta_title',
                            'meta_description',
                            'order',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->newCategoryRepository->update($newCategory, $input);

        return redirect()->action('Admin\NewCategoryController@show', [$id])
                    ->with('message-success', trans('admin.messages.general.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Response
     */
    public function destroy($id)
    {
        /** @var  \App\Models\NewCategory $newCategory */
        $newCategory = $this->newCategoryRepository->find($id);
        if( empty($newCategory) ) {
            abort(404);
        }
        $this->newCategoryRepository->delete($newCategory);

        return redirect()->action('Admin\NewCategoryController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
