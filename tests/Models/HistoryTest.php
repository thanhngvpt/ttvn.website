<?php namespace Tests\Models;

use App\Models\History;
use Tests\TestCase;

class HistoryTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\History $history */
        $history = new History();
        $this->assertNotNull($history);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\History $history */
        $historyModel = new History();

        $historyData = factory(History::class)->make();
        foreach( $historyData->toFillableArray() as $key => $value ) {
            $historyModel->$key = $value;
        }
        $historyModel->save();

        $this->assertNotNull(History::find($historyModel->id));
    }

}
