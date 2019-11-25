<?php namespace App\Repositories\Eloquent;

use \App\Repositories\JobRepositoryInterface;
use \App\Models\Job;

class JobRepository extends SingleKeyModelRepository implements JobRepositoryInterface
{

    public function getBlankModel()
    {
        return new Job();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

}
