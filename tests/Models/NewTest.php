<?php namespace Tests\Models;

use App\Models\New;
use Tests\TestCase;

class NewTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\New $new */
        $new = new New();
        $this->assertNotNull($new);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\New $new */
        $newModel = new New();

        $newData = factory(New::class)->make();
        foreach( $newData->toFillableArray() as $key => $value ) {
            $newModel->$key = $value;
        }
        $newModel->save();

        $this->assertNotNull(New::find($newModel->id));
    }

}
