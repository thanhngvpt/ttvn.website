<?php namespace App\Repositories\Eloquent;

use \App\Repositories\IntroduceRepositoryInterface;
use \App\Models\Introduce;

class IntroduceRepository extends SingleKeyModelRepository implements IntroduceRepositoryInterface
{

    public function getBlankModel()
    {
        return new Introduce();
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
