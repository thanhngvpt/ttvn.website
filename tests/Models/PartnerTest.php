<?php namespace Tests\Models;

use App\Models\Partner;
use Tests\TestCase;

class PartnerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Partner $partner */
        $partner = new Partner();
        $this->assertNotNull($partner);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Partner $partner */
        $partnerModel = new Partner();

        $partnerData = factory(Partner::class)->make();
        foreach( $partnerData->toFillableArray() as $key => $value ) {
            $partnerModel->$key = $value;
        }
        $partnerModel->save();

        $this->assertNotNull(Partner::find($partnerModel->id));
    }

}
