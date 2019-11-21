<?php namespace Tests\Models;

use App\Models\InforGroup;
use Tests\TestCase;

class InforGroupTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\InforGroup $inforGroup */
        $inforGroup = new InforGroup();
        $this->assertNotNull($inforGroup);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\InforGroup $inforGroup */
        $inforGroupModel = new InforGroup();

        $inforGroupData = factory(InforGroup::class)->make();
        foreach( $inforGroupData->toFillableArray() as $key => $value ) {
            $inforGroupModel->$key = $value;
        }
        $inforGroupModel->save();

        $this->assertNotNull(InforGroup::find($inforGroupModel->id));
    }

}
