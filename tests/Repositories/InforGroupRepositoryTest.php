<?php namespace Tests\Repositories;

use App\Models\InforGroup;
use Tests\TestCase;

class InforGroupRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\InforGroupRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\InforGroupRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $inforGroups = factory(InforGroup::class, 3)->create();
        $inforGroupIds = $inforGroups->pluck('id')->toArray();

        /** @var  \App\Repositories\InforGroupRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\InforGroupRepositoryInterface::class);
        $this->assertNotNull($repository);

        $inforGroupsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(InforGroup::class, $inforGroupsCheck[0]);

        $inforGroupsCheck = $repository->getByIds($inforGroupIds);
        $this->assertEquals(3, count($inforGroupsCheck));
    }

    public function testFind()
    {
        $inforGroups = factory(InforGroup::class, 3)->create();
        $inforGroupIds = $inforGroups->pluck('id')->toArray();

        /** @var  \App\Repositories\InforGroupRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\InforGroupRepositoryInterface::class);
        $this->assertNotNull($repository);

        $inforGroupCheck = $repository->find($inforGroupIds[0]);
        $this->assertEquals($inforGroupIds[0], $inforGroupCheck->id);
    }

    public function testCreate()
    {
        $inforGroupData = factory(InforGroup::class)->make();

        /** @var  \App\Repositories\InforGroupRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\InforGroupRepositoryInterface::class);
        $this->assertNotNull($repository);

        $inforGroupCheck = $repository->create($inforGroupData->toFillableArray());
        $this->assertNotNull($inforGroupCheck);
    }

    public function testUpdate()
    {
        $inforGroupData = factory(InforGroup::class)->create();

        /** @var  \App\Repositories\InforGroupRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\InforGroupRepositoryInterface::class);
        $this->assertNotNull($repository);

        $inforGroupCheck = $repository->update($inforGroupData, $inforGroupData->toFillableArray());
        $this->assertNotNull($inforGroupCheck);
    }

    public function testDelete()
    {
        $inforGroupData = factory(InforGroup::class)->create();

        /** @var  \App\Repositories\InforGroupRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\InforGroupRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($inforGroupData);

        $inforGroupCheck = $repository->find($inforGroupData->id);
        $this->assertNull($inforGroupCheck);
    }

}
