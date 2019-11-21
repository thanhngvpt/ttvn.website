<?php namespace App\Repositories\Eloquent;

use \App\Repositories\TableNewRepositoryInterface;
use \App\Models\TableNew;

class TableNewRepository extends SingleKeyModelRepository implements TableNewRepositoryInterface
{

    public function getBlankModel()
    {
        return new TableNew();
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
