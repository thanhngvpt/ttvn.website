<?php namespace App\Repositories\Eloquent;

use \App\Repositories\DataHighlightRepositoryInterface;
use \App\Models\DataHighlight;

class DataHighlightRepository extends SingleKeyModelRepository implements DataHighlightRepositoryInterface
{

    public function getBlankModel()
    {
        return new DataHighlight();
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
