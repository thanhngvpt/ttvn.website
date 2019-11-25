<?php namespace App\Repositories\Eloquent;

use \App\Repositories\HeadingRepositoryInterface;
use \App\Models\Heading;

class HeadingRepository extends SingleKeyModelRepository implements HeadingRepositoryInterface
{

    public function getBlankModel()
    {
        return new Heading();
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
