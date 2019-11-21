<?php

namespace App\Presenters;

use Illuminate\Support\Facades\Redis;
use App\Models\JobCategory;
use App\Models\Company;

class JobPresenter extends BasePresenter
{
    protected $multilingualFields = [];

    protected $imageFields = [];

    /**
    * @return \App\Models\JobCategory
    * */
    public function jobCategory()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('JobCategoryModel');
            $cached = Redis::hget($cacheKey, $this->entity->job_category_id);

            if( $cached ) {
                $jobCategory = new JobCategory(json_decode($cached, true));
                $jobCategory['id'] = json_decode($cached, true)['id'];
                return $jobCategory;
            } else {
                $jobCategory = $this->entity->jobCategory;
                Redis::hsetnx($cacheKey, $this->entity->job_category_id, $jobCategory);
                return $jobCategory;
            }
        }

        $jobCategory = $this->entity->jobCategory;
        return $jobCategory;
    }

    /**
    * @return \App\Models\Company
    * */
    public function company()
    {
        if( \CacheHelper::cacheRedisEnabled() ) {
            $cacheKey = \CacheHelper::keyForModel('CompanyModel');
            $cached = Redis::hget($cacheKey, $this->entity->company_id);

            if( $cached ) {
                $company = new Company(json_decode($cached, true));
                $company['id'] = json_decode($cached, true)['id'];
                return $company;
            } else {
                $company = $this->entity->company;
                Redis::hsetnx($cacheKey, $this->entity->company_id, $company);
                return $company;
            }
        }

        $company = $this->entity->company;
        return $company;
    }

    
}
