<?php namespace App\Repositories\Eloquent;

use \App\Repositories\CriteriaCandidateRepositoryInterface;
use \App\Models\CriteriaCandidate;

class CriteriaCandidateRepository extends SingleKeyModelRepository implements CriteriaCandidateRepositoryInterface
{

    public function getBlankModel()
    {
        return new CriteriaCandidate();
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
