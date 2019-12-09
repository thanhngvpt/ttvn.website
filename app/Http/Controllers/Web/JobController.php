<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CulturalCompany;
use App\Models\CriteriaCandidate;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Cadidate;

use View;
use \App\Repositories\JobRepositoryInterface;
use App\Http\Requests\PaginationRequest;

use App\Services\FileUploadServiceInterface;
use App\Http\Requests\User\JobSubmitRequest;

class JobController extends Controller
{
    protected $jobRepo;
    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    public function __construct(JobRepositoryInterface $jobRepo, FileUploadServiceInterface $fileUploadService)
    {
        $this->jobRepo = $jobRepo;
        $this->fileUploadService = $fileUploadService;
    }
    public function index()
    {
        $cultural_companies = CulturalCompany::orderBy('id', 'desc')->first();
        $criteria_candidate = CriteriaCandidate::all();
        $jobs = Job::take(5)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        
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
        $data = $this->jobRepo->getByJobCategory($page, $category_id, $province, $keyword);

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
                'paginate' => $paginate,
                'count' => $data['count']
            ];
        }

        return view('pages.web.list-job', [
            'job_categories' => $job_categories,
            'data'  =>  $data
        ]);
    }

    public function detail($slug)
    {
        $job = Job::where('slug', $slug)->first();

        return view('pages.web.job-detail', [
            'job' => $job
        ]);
    }

    public function postCV(JobSubmitRequest $request)
    {
        $input = $request->only([
            'name', 'email', 'phone'
        ]);

        $slug = $request->get('slug');
        $input['link_job'] = route('job.details', ['slug' => $slug]);
        $candidates = Cadidate::create($input);
        if($request->hasFile('file')) {
            $file = $request->file('file');
            
            $filePath = $this->fileUploadService->upload(
                'file',
                $file,
                [
                    'entity_type' => 'banner_cover_image',
                    'entity_id'   => $candidates->id,
                    'title'       => $request->input('title_page', ''),
                ]
            );

            if ($filePath) {
                $candidates->file = $filePath;
                $candidates->save();
            } 
                
        }  

        if (empty($candidates)) {
            return back()->with('error','Gửi thông tin thất bại');
        }

        return back()->with('success','Bạn đã gửi thông tin thành công!');
    }
}
