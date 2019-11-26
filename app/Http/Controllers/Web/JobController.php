<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CulturalCompany;
use App\Models\CriteriaCandidate;
use App\Models\Job;

class JobController extends Controller
{
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
}
