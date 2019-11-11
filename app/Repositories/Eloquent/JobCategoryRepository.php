<?php namespace App\Repositories\Eloquent;

use \App\Repositories\JobCategoryRepositoryInterface;
use \App\Models\JobCategory;

class JobCategoryRepository extends SingleKeyModelRepository implements JobCategoryRepositoryInterface
{

    public function getBlankModel()
    {
        return new JobCategory();
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
