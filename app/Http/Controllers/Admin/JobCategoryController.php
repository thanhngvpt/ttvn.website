<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\JobCategoryRepositoryInterface;
use App\Http\Requests\Admin\JobCategoryRequest;
use App\Http\Requests\PaginationRequest;

class JobCategoryController extends Controller
{
    /** @var  \App\Repositories\JobCategoryRepositoryInterface */
    protected $jobCategoryRepository;

    public function __construct(
        JobCategoryRepositoryInterface $jobCategoryRepository
    ) {
        $this->jobCategoryRepository = $jobCategoryRepository;
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
        $paginate['baseUrl']    = action('Admin\JobCategoryController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->jobCategoryRepository->countByFilter($filter);
        $jobCategories = $this->jobCategoryRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.job-categories.index',
            [
                'jobCategories'    => $jobCategories,
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
            'pages.admin.' . config('view.admin') . '.job-categories.edit',
            [
                'isNew'     => true,
                'jobCategory' => $this->jobCategoryRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(JobCategoryRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $jobCategory = $this->jobCategoryRepository->create($input);

        if( empty($jobCategory) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\JobCategoryController@index')
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
        $jobCategory = $this->jobCategoryRepository->find($id);
        if( empty($jobCategory) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.job-categories.edit',
            [
                'isNew' => false,
                'jobCategory' => $jobCategory,
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
    public function update($id, JobCategoryRequest $request)
    {
        /** @var  \App\Models\JobCategory $jobCategory */
        $jobCategory = $this->jobCategoryRepository->find($id);
        if( empty($jobCategory) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->jobCategoryRepository->update($jobCategory, $input);

        return redirect()->action('Admin\JobCategoryController@show', [$id])
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
        /** @var  \App\Models\JobCategory $jobCategory */
        $jobCategory = $this->jobCategoryRepository->find($id);
        if( empty($jobCategory) ) {
            abort(404);
        }
        $this->jobCategoryRepository->delete($jobCategory);

        return redirect()->action('Admin\JobCategoryController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
