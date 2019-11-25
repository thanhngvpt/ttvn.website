<?php namespace Tests\Models;

use App\Models\Meta;
use Tests\TestCase;

class MetaTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Meta $meta */
        $meta = new Meta();
        $this->assertNotNull($meta);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Meta $meta */
        $metaModel = new Meta();

        $metaData = factory(Meta::class)->make();
        foreach( $metaData->toFillableArray() as $key => $value ) {
            $metaModel->$key = $value;
        }
        $metaModel->save();

        $this->assertNotNull(Meta::find($metaModel->id));
    }

}
