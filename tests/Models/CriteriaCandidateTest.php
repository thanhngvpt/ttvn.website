<?php namespace Tests\Models;

use App\Models\CriteriaCandidate;
use Tests\TestCase;

class CriteriaCandidateTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\CriteriaCandidate $criteriaCandidate */
        $criteriaCandidate = new CriteriaCandidate();
        $this->assertNotNull($criteriaCandidate);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\CriteriaCandidate $criteriaCandidate */
        $criteriaCandidateModel = new CriteriaCandidate();

        $criteriaCandidateData = factory(CriteriaCandidate::class)->make();
        foreach( $criteriaCandidateData->toFillableArray() as $key => $value ) {
            $criteriaCandidateModel->$key = $value;
        }
        $criteriaCandidateModel->save();

        $this->assertNotNull(CriteriaCandidate::find($criteriaCandidateModel->id));
    }

}
