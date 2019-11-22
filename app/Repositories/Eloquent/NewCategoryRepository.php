<?php namespace App\Repositories\Eloquent;

use \App\Repositories\NewCategoryRepositoryInterface;
use \App\Models\NewCategory;

class NewCategoryRepository extends SingleKeyModelRepository implements NewCategoryRepositoryInterface
{

    public function getBlankModel()
    {
        return new NewCategory();
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
