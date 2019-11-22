<?php namespace App\Repositories\Eloquent;

use \App\Repositories\InforGroupRepositoryInterface;
use \App\Models\InforGroup;

class InforGroupRepository extends SingleKeyModelRepository implements InforGroupRepositoryInterface
{

    public function getBlankModel()
    {
        return new InforGroup();
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
