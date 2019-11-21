<?php namespace Tests\Models;

use App\Models\SaveValue;
use Tests\TestCase;

class SaveValueTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\SaveValue $saveValue */
        $saveValue = new SaveValue();
        $this->assertNotNull($saveValue);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\SaveValue $saveValue */
        $saveValueModel = new SaveValue();

        $saveValueData = factory(SaveValue::class)->make();
        foreach( $saveValueData->toFillableArray() as $key => $value ) {
            $saveValueModel->$key = $value;
        }
        $saveValueModel->save();

        $this->assertNotNull(SaveValue::find($saveValueModel->id));
    }

}
