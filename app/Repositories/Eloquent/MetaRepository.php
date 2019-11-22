<?php namespace App\Repositories\Eloquent;

use \App\Repositories\MetaRepositoryInterface;
use \App\Models\Meta;

class MetaRepository extends SingleKeyModelRepository implements MetaRepositoryInterface
{

    public function getBlankModel()
    {
        return new Meta();
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
