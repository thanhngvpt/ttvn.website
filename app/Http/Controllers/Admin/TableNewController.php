<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\TableNewRepositoryInterface;
use App\Http\Requests\Admin\TableNewRequest;
use App\Http\Requests\PaginationRequest;

class TableNewController extends Controller
{
    /** @var  \App\Repositories\TableNewRepositoryInterface */
    protected $tableNewRepository;

    public function __construct(
        TableNewRepositoryInterface $tableNewRepository
    ) {
        $this->tableNewRepository = $tableNewRepository;
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
        $paginate['baseUrl']    = action('Admin\TableNewController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->tableNewRepository->countByFilter($filter);
        $tableNews = $this->tableNewRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.table-news.index',
            [
                'tableNews'    => $tableNews,
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
            'pages.admin.' . config('view.admin') . '.table-news.edit',
            [
                'isNew'     => true,
                'tableNew' => $this->tableNewRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(TableNewRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                            'slug',
                            'cover_image_id',
                            'new_category_id',
                            'display',
                            'order',
                            'meta_title',
                            'meta_description',
                            'sapo',
                            'content',
                            'auth',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $tableNew = $this->tableNewRepository->create($input);

        if( empty($tableNew) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\TableNewController@index')
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
        $tableNew = $this->tableNewRepository->find($id);
        if( empty($tableNew) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.table-news.edit',
            [
                'isNew' => false,
                'tableNew' => $tableNew,
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
    public function update($id, TableNewRequest $request)
    {
        /** @var  \App\Models\TableNew $tableNew */
        $tableNew = $this->tableNewRepository->find($id);
        if( empty($tableNew) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                            'slug',
                            'cover_image_id',
                            'new_category_id',
                            'display',
                            'order',
                            'meta_title',
                            'meta_description',
                            'sapo',
                            'content',
                            'auth',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->tableNewRepository->update($tableNew, $input);

        return redirect()->action('Admin\TableNewController@show', [$id])
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
        /** @var  \App\Models\TableNew $tableNew */
        $tableNew = $this->tableNewRepository->find($id);
        if( empty($tableNew) ) {
            abort(404);
        }
        $this->tableNewRepository->delete($tableNew);

        return redirect()->action('Admin\TableNewController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
