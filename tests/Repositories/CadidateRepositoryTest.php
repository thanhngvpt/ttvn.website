<?php namespace Tests\Repositories;

use App\Models\Cadidate;
use Tests\TestCase;

class CadidateRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\CadidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CadidateRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $cadidates = factory(Cadidate::class, 3)->create();
        $cadidateIds = $cadidates->pluck('id')->toArray();

        /** @var  \App\Repositories\CadidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CadidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $cadidatesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Cadidate::class, $cadidatesCheck[0]);

        $cadidatesCheck = $repository->getByIds($cadidateIds);
        $this->assertEquals(3, count($cadidatesCheck));
    }

    public function testFind()
    {
        $cadidates = factory(Cadidate::class, 3)->create();
        $cadidateIds = $cadidates->pluck('id')->toArray();

        /** @var  \App\Repositories\CadidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CadidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $cadidateCheck = $repository->find($cadidateIds[0]);
        $this->assertEquals($cadidateIds[0], $cadidateCheck->id);
    }

    public function testCreate()
    {
        $cadidateData = factory(Cadidate::class)->make();

        /** @var  \App\Repositories\CadidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CadidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $cadidateCheck = $repository->create($cadidateData->toFillableArray());
        $this->assertNotNull($cadidateCheck);
    }

    public function testUpdate()
    {
        $cadidateData = factory(Cadidate::class)->create();

        /** @var  \App\Repositories\CadidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CadidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $cadidateCheck = $repository->update($cadidateData, $cadidateData->toFillableArray());
        $this->assertNotNull($cadidateCheck);
    }

    public function testDelete()
    {
        $cadidateData = factory(Cadidate::class)->create();

        /** @var  \App\Repositories\CadidateRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CadidateRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($cadidateData);

        $cadidateCheck = $repository->find($cadidateData->id);
        $this->assertNull($cadidateCheck);
    }

}
