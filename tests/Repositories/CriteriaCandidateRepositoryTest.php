<?php namespace Tests\Repositories;

use App\Models\CriteriaCandidate;
use Tests\TestCase;

class CriteriaCandidateRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\CriteriaCandidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CriteriaCandidateRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $criteriaCandidates = factory(CriteriaCandidate::class, 3)->create();
        $criteriaCandidateIds = $criteriaCandidates->pluck('id')->toArray();

        /** @var  \App\Repositories\CriteriaCandidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CriteriaCandidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $criteriaCandidatesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(CriteriaCandidate::class, $criteriaCandidatesCheck[0]);

        $criteriaCandidatesCheck = $repository->getByIds($criteriaCandidateIds);
        $this->assertEquals(3, count($criteriaCandidatesCheck));
    }

    public function testFind()
    {
        $criteriaCandidates = factory(CriteriaCandidate::class, 3)->create();
        $criteriaCandidateIds = $criteriaCandidates->pluck('id')->toArray();

        /** @var  \App\Repositories\CriteriaCandidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CriteriaCandidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $criteriaCandidateCheck = $repository->find($criteriaCandidateIds[0]);
        $this->assertEquals($criteriaCandidateIds[0], $criteriaCandidateCheck->id);
    }

    public function testCreate()
    {
        $criteriaCandidateData = factory(CriteriaCandidate::class)->make();

        /** @var  \App\Repositories\CriteriaCandidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CriteriaCandidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $criteriaCandidateCheck = $repository->create($criteriaCandidateData->toFillableArray());
        $this->assertNotNull($criteriaCandidateCheck);
    }

    public function testUpdate()
    {
        $criteriaCandidateData = factory(CriteriaCandidate::class)->create();

        /** @var  \App\Repositories\CriteriaCandidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CriteriaCandidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $criteriaCandidateCheck = $repository->update($criteriaCandidateData, $criteriaCandidateData->toFillableArray());
        $this->assertNotNull($criteriaCandidateCheck);
    }

    public function testDelete()
    {
        $criteriaCandidateData = factory(CriteriaCandidate::class)->create();

        /** @var  \App\Repositories\CriteriaCandidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CriteriaCandidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($criteriaCandidateData);

        $criteriaCandidateCheck = $repository->find($criteriaCandidateData->id);
        $this->assertNull($criteriaCandidateCheck);
    }

}
