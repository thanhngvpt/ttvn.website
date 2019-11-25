<?php namespace App\Repositories\Eloquent;

use \App\Repositories\FieldRepositoryInterface;
use \App\Models\Field;

class FieldRepository extends SingleKeyModelRepository implements FieldRepositoryInterface
{

    public function getBlankModel()
    {
        return new Field();
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
