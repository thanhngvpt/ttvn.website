<?php namespace Tests\Models;

use App\Models\TableNew;
use Tests\TestCase;

class TableNewTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\TableNew $tableNew */
        $tableNew = new TableNew();
        $this->assertNotNull($tableNew);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\TableNew $tableNew */
        $tableNewModel = new TableNew();

        $tableNewData = factory(TableNew::class)->make();
        foreach( $tableNewData->toFillableArray() as $key => $value ) {
            $tableNewModel->$key = $value;
        }
        $tableNewModel->save();

        $this->assertNotNull(TableNew::find($tableNewModel->id));
    }

}
