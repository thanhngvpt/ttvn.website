<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\JobRepositoryInterface;
use App\Http\Requests\Admin\JobRequest;
use App\Http\Requests\PaginationRequest;

class JobController extends Controller
{
    /** @var  \App\Repositories\JobRepositoryInterface */
    protected $jobRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository
    ) {
        $this->jobRepository = $jobRepository;
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
        $paginate['baseUrl']    = action('Admin\JobController@index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->jobRepository->countByFilter($filter);
        $jobs = $this->jobRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'pages.admin.' . config('view.admin') . '.jobs.index',
            [
                'jobs'    => $jobs,
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
            'pages.admin.' . config('view.admin') . '.jobs.edit',
            [
                'isNew'     => true,
                'job' => $this->jobRepository->getBlankModel(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    $request
     * @return  \Response
     */
    public function store(JobRequest $request)
    {
        $input = $request->only(
            [
                            'name',
                            'job_category_id',
                            'slug',
                            'meta_title',
                            'meta_description',
                            'company_id',
                            'province',
                            'district',
                            'number',
                            'salary',
                            'end_time',
                            'order',
                            'description',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $job = $this->jobRepository->create($input);

        if( empty($job) ) {
            return redirect()->back()->with('message-error', trans('admin.errors.general.save_failed'));
        }

        return redirect()->action('Admin\JobController@index')
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
        $job = $this->jobRepository->find($id);
        if( empty($job) ) {
            abort(404);
        }

        return view(
            'pages.admin.' . config('view.admin') . '.jobs.edit',
            [
                'isNew' => false,
                'job' => $job,
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
    public function update($id, JobRequest $request)
    {
        /** @var  \App\Models\Job $job */
        $job = $this->jobRepository->find($id);
        if( empty($job) ) {
            abort(404);
        }

        $input = $request->only(
            [
                            'name',
                            'job_category_id',
                            'slug',
                            'meta_title',
                            'meta_description',
                            'company_id',
                            'province',
                            'district',
                            'number',
                            'salary',
                            'end_time',
                            'order',
                            'description',
                            'is_enabled',
                        ]
        );

        $input['is_enabled'] = $request->get('is_enabled', 0);
        $this->jobRepository->update($job, $input);

        return redirect()->action('Admin\JobController@show', [$id])
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
        /** @var  \App\Models\Job $job */
        $job = $this->jobRepository->find($id);
        if( empty($job) ) {
            abort(404);
        }
        $this->jobRepository->delete($job);

        return redirect()->action('Admin\JobController@index')
                    ->with('message-success', trans('admin.messages.general.delete_success'));
    }

}
