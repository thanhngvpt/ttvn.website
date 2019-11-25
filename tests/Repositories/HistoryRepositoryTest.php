<?php namespace Tests\Repositories;

use App\Models\History;
use Tests\TestCase;

class HistoryRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\HistoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HistoryRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $histories = factory(History::class, 3)->create();
        $historyIds = $histories->pluck('id')->toArray();

        /** @var  \App\Repositories\HistoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HistoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $historiesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(History::class, $historiesCheck[0]);

        $historiesCheck = $repository->getByIds($historyIds);
        $this->assertEquals(3, count($historiesCheck));
    }

    public function testFind()
    {
        $histories = factory(History::class, 3)->create();
        $historyIds = $histories->pluck('id')->toArray();

        /** @var  \App\Repositories\HistoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HistoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $historyCheck = $repository->find($historyIds[0]);
        $this->assertEquals($historyIds[0], $historyCheck->id);
    }

    public function testCreate()
    {
        $historyData = factory(History::class)->make();

        /** @var  \App\Repositories\HistoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HistoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $historyCheck = $repository->create($historyData->toFillableArray());
        $this->assertNotNull($historyCheck);
    }

    public function testUpdate()
    {
        $historyData = factory(History::class)->create();

        /** @var  \App\Repositories\HistoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HistoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $historyCheck = $repository->update($historyData, $historyData->toFillableArray());
        $this->assertNotNull($historyCheck);
    }

    public function testDelete()
    {
        $historyData = factory(History::class)->create();

        /** @var  \App\Repositories\HistoryRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\HistoryRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($historyData);

        $historyCheck = $repository->find($historyData->id);
        $this->assertNull($historyCheck);
    }

}
