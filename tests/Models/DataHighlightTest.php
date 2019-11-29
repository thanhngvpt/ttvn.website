<?php namespace Tests\Models;

use App\Models\DataHighLight;
use Tests\TestCase;

class DataHighLightTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\DataHighLight $dataHighLight */
        $dataHighLight = new DataHighLight();
        $this->assertNotNull($dataHighLight);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\DataHighLight $dataHighLight */
        $dataHighLightModel = new DataHighLight();

        $dataHighLightData = factory(DataHighLight::class)->make();
        foreach( $dataHighLightData->toFillableArray() as $key => $value ) {
            $dataHighLightModel->$key = $value;
        }
        $dataHighLightModel->save();

        $this->assertNotNull(DataHighLight::find($dataHighLightModel->id));
    }

}
