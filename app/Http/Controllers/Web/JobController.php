<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CulturalCompany;
use App\Models\CriteriaCandidate;
use App\Models\Job;
use App\Models\JobCategory;
use View;
use \App\Repositories\JobRepositoryInterface;
use App\Http\Requests\PaginationRequest;

class JobController extends Controller
{
    protected $jobRepo;

    public function __construct(JobRepositoryInterface $jobRepo)
    {
        $this->jobRepo= $jobRepo;
    }
    public function index()
    {
        $cultural_companies = CulturalCompany::first();
        $criteria_candidate = CriteriaCandidate::all();
        $jobs = Job::take(5)->orderBy('id', 'desc');
        
        return view('pages.web.job', [
            'cultural_companies' => $cultural_companies,
            'criteria_candidate' => $criteria_candidate,
            'jobs' => $jobs
        ]);
    }

    public function listJob(PaginationRequest $request)
    {
        $page =  $request->get('page', 1);
        $category_id = $request->get('category_id', 0);
        $province = $request->get('province', 'all');
        $keyword = $request->get('keyword', null);
        
        $job_categories = JobCategory::all();
        $data = $this->jobRepo->getByJobCategory($page,$category_id, $province, $keyword);
        
        if($request->ajax()){
            $html_mobile = View::make('pages.web.job-mobile',
                                        [
                                            'job_categories' => $job_categories,
                                            'data'  =>  $data
                                        ])->render();

            $html_desktop = View::make('pages.web.job-desktop', 
                                        [
                                            'job_categories' => $job_categories,
                                            'data'  =>  $data
                                        ])->render();
            
            $paginate = View::make('pages.web.job-paginate', 
                                        [
                                            'data'  =>  $data
                                        ])->render();
                                            
            return [
                'html_mobile' =>  $html_mobile,
                'html_desktop' => $html_desktop,
                'paginate' => $paginate
            ];
        }

        return view('pages.web.list-job', [
            'job_categories' => $job_categories,
            'data'  =>  $data
        ]);
    }
}
