<?php namespace App\Repositories\Eloquent;

use \App\Repositories\CadidateRepositoryInterface;
use \App\Models\Cadidate;

class CadidateRepository extends SingleKeyModelRepository implements CadidateRepositoryInterface
{

    public function getBlankModel()
    {
        return new Cadidate();
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
