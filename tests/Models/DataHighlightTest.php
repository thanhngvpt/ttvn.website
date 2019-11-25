<?php namespace Tests\Models;

use App\Models\DataHighlight;
use Tests\TestCase;

class DataHighlightTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\DataHighlight $dataHighlight */
        $dataHighlight = new DataHighlight();
        $this->assertNotNull($dataHighlight);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\DataHighlight $dataHighlight */
        $dataHighlightModel = new DataHighlight();

        $dataHighlightData = factory(DataHighlight::class)->make();
        foreach( $dataHighlightData->toFillableArray() as $key => $value ) {
            $dataHighlightModel->$key = $value;
        }
        $dataHighlightModel->save();

        $this->assertNotNull(DataHighlight::find($dataHighlightModel->id));
    }

}
