<?php namespace App\Repositories\Eloquent;

use \App\Repositories\HistoryRepositoryInterface;
use \App\Models\History;

class HistoryRepository extends SingleKeyModelRepository implements HistoryRepositoryInterface
{

    public function getBlankModel()
    {
        return new History();
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
