<?php namespace Tests\Repositories;

use App\Models\LeaderShip;
use Tests\TestCase;

class LeaderShipRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\LeaderShipRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LeaderShipRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $leaderShips = factory(LeaderShip::class, 3)->create();
        $leaderShipIds = $leaderShips->pluck('id')->toArray();

        /** @var  \App\Repositories\LeaderShipRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LeaderShipRepositoryInterface::class);
        $this->assertNotNull($repository);

        $leaderShipsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(LeaderShip::class, $leaderShipsCheck[0]);

        $leaderShipsCheck = $repository->getByIds($leaderShipIds);
        $this->assertEquals(3, count($leaderShipsCheck));
    }

    public function testFind()
    {
        $leaderShips = factory(LeaderShip::class, 3)->create();
        $leaderShipIds = $leaderShips->pluck('id')->toArray();

        /** @var  \App\Repositories\LeaderShipRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LeaderShipRepositoryInterface::class);
        $this->assertNotNull($repository);

        $leaderShipCheck = $repository->find($leaderShipIds[0]);
        $this->assertEquals($leaderShipIds[0], $leaderShipCheck->id);
    }

    public function testCreate()
    {
        $leaderShipData = factory(LeaderShip::class)->make();

        /** @var  \App\Repositories\LeaderShipRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LeaderShipRepositoryInterface::class);
        $this->assertNotNull($repository);

        $leaderShipCheck = $repository->create($leaderShipData->toFillableArray());
        $this->assertNotNull($leaderShipCheck);
    }

    public function testUpdate()
    {
        $leaderShipData = factory(LeaderShip::class)->create();

        /** @var  \App\Repositories\LeaderShipRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LeaderShipRepositoryInterface::class);
        $this->assertNotNull($repository);

        $leaderShipCheck = $repository->update($leaderShipData, $leaderShipData->toFillableArray());
        $this->assertNotNull($leaderShipCheck);
    }

    public function testDelete()
    {
        $leaderShipData = factory(LeaderShip::class)->create();

        /** @var  \App\Repositories\LeaderShipRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\LeaderShipRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($leaderShipData);

        $leaderShipCheck = $repository->find($leaderShipData->id);
        $this->assertNull($leaderShipCheck);
    }

}
