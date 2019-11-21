<?php namespace Tests\Models;

use App\Models\Cadidate;
use Tests\TestCase;

class CadidateTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Cadidate $cadidate */
        $cadidate = new Cadidate();
        $this->assertNotNull($cadidate);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Cadidate $cadidate */
        $cadidateModel = new Cadidate();

        $cadidateData = factory(Cadidate::class)->make();
        foreach( $cadidateData->toFillableArray() as $key => $value ) {
            $cadidateModel->$key = $value;
        }
        $cadidateModel->save();

        $this->assertNotNull(Cadidate::find($cadidateModel->id));
    }

}
