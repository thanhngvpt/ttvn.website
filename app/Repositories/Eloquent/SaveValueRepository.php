<?php namespace App\Repositories\Eloquent;

use \App\Repositories\SaveValueRepositoryInterface;
use \App\Models\SaveValue;

class SaveValueRepository extends SingleKeyModelRepository implements SaveValueRepositoryInterface
{

    public function getBlankModel()
    {
        return new SaveValue();
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
