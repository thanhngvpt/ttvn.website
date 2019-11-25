<?php namespace Tests\Repositories;

use App\Models\Introduce;
use Tests\TestCase;

class IntroduceRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\IntroduceRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\IntroduceRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $introduces = factory(Introduce::class, 3)->create();
        $introduceIds = $introduces->pluck('id')->toArray();

        /** @var  \App\Repositories\IntroduceRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\IntroduceRepositoryInterface::class);
        $this->assertNotNull($repository);

        $introducesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Introduce::class, $introducesCheck[0]);

        $introducesCheck = $repository->getByIds($introduceIds);
        $this->assertEquals(3, count($introducesCheck));
    }

    public function testFind()
    {
        $introduces = factory(Introduce::class, 3)->create();
        $introduceIds = $introduces->pluck('id')->toArray();

        /** @var  \App\Repositories\IntroduceRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\IntroduceRepositoryInterface::class);
        $this->assertNotNull($repository);

        $introduceCheck = $repository->find($introduceIds[0]);
        $this->assertEquals($introduceIds[0], $introduceCheck->id);
    }

    public function testCreate()
    {
        $introduceData = factory(Introduce::class)->make();

        /** @var  \App\Repositories\IntroduceRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\IntroduceRepositoryInterface::class);
        $this->assertNotNull($repository);

        $introduceCheck = $repository->create($introduceData->toFillableArray());
        $this->assertNotNull($introduceCheck);
    }

    public function testUpdate()
    {
        $introduceData = factory(Introduce::class)->create();

        /** @var  \App\Repositories\IntroduceRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\IntroduceRepositoryInterface::class);
        $this->assertNotNull($repository);

        $introduceCheck = $repository->update($introduceData, $introduceData->toFillableArray());
        $this->assertNotNull($introduceCheck);
    }

    public function testDelete()
    {
        $introduceData = factory(Introduce::class)->create();

        /** @var  \App\Repositories\IntroduceRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\IntroduceRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($introduceData);

        $introduceCheck = $repository->find($introduceData->id);
        $this->assertNull($introduceCheck);
    }

}
