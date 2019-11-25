<?php namespace Tests\Repositories;

use App\Models\TableNew;
use Tests\TestCase;

class TableNewRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\TableNewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\TableNewRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $tableNews = factory(TableNew::class, 3)->create();
        $tableNewIds = $tableNews->pluck('id')->toArray();

        /** @var  \App\Repositories\TableNewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\TableNewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $tableNewsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(TableNew::class, $tableNewsCheck[0]);

        $tableNewsCheck = $repository->getByIds($tableNewIds);
        $this->assertEquals(3, count($tableNewsCheck));
    }

    public function testFind()
    {
        $tableNews = factory(TableNew::class, 3)->create();
        $tableNewIds = $tableNews->pluck('id')->toArray();

        /** @var  \App\Repositories\TableNewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\TableNewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $tableNewCheck = $repository->find($tableNewIds[0]);
        $this->assertEquals($tableNewIds[0], $tableNewCheck->id);
    }

    public function testCreate()
    {
        $tableNewData = factory(TableNew::class)->make();

        /** @var  \App\Repositories\TableNewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\TableNewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $tableNewCheck = $repository->create($tableNewData->toFillableArray());
        $this->assertNotNull($tableNewCheck);
    }

    public function testUpdate()
    {
        $tableNewData = factory(TableNew::class)->create();

        /** @var  \App\Repositories\TableNewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\TableNewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $tableNewCheck = $repository->update($tableNewData, $tableNewData->toFillableArray());
        $this->assertNotNull($tableNewCheck);
    }

    public function testDelete()
    {
        $tableNewData = factory(TableNew::class)->create();

        /** @var  \App\Repositories\TableNewRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\TableNewRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($tableNewData);

        $tableNewCheck = $repository->find($tableNewData->id);
        $this->assertNull($tableNewCheck);
    }

}
