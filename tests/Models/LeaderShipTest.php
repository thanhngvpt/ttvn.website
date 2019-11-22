<?php namespace Tests\Models;

use App\Models\LeaderShip;
use Tests\TestCase;

class LeaderShipTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\LeaderShip $leaderShip */
        $leaderShip = new LeaderShip();
        $this->assertNotNull($leaderShip);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\LeaderShip $leaderShip */
        $leaderShipModel = new LeaderShip();

        $leaderShipData = factory(LeaderShip::class)->make();
        foreach( $leaderShipData->toFillableArray() as $key => $value ) {
            $leaderShipModel->$key = $value;
        }
        $leaderShipModel->save();

        $this->assertNotNull(LeaderShip::find($leaderShipModel->id));
    }

}
