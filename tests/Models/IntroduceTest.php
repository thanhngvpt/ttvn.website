<?php namespace Tests\Models;

use App\Models\Introduce;
use Tests\TestCase;

class IntroduceTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Introduce $introduce */
        $introduce = new Introduce();
        $this->assertNotNull($introduce);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Introduce $introduce */
        $introduceModel = new Introduce();

        $introduceData = factory(Introduce::class)->make();
        foreach( $introduceData->toFillableArray() as $key => $value ) {
            $introduceModel->$key = $value;
        }
        $introduceModel->save();

        $this->assertNotNull(Introduce::find($introduceModel->id));
    }

}
