<?php namespace Tests\Models;

use App\Models\Heading;
use Tests\TestCase;

class HeadingTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Heading $heading */
        $heading = new Heading();
        $this->assertNotNull($heading);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Heading $heading */
        $headingModel = new Heading();

        $headingData = factory(Heading::class)->make();
        foreach( $headingData->toFillableArray() as $key => $value ) {
            $headingModel->$key = $value;
        }
        $headingModel->save();

        $this->assertNotNull(Heading::find($headingModel->id));
    }

}
