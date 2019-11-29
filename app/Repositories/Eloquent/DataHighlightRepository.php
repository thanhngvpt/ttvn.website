<?php namespace App\Repositories\Eloquent;

use \App\Repositories\DataHighLightRepositoryInterface;
use \App\Models\DataHighLight;

class DataHighLightRepository extends SingleKeyModelRepository implements DataHighLightRepositoryInterface
{

    public function getBlankModel()
    {
        return new DataHighLight();
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
