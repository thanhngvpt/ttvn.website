<?php namespace Tests\Models;

use App\Models\CulturalCompany;
use Tests\TestCase;

class CulturalCompanyTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\CulturalCompany $culturalCompany */
        $culturalCompany = new CulturalCompany();
        $this->assertNotNull($culturalCompany);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\CulturalCompany $culturalCompany */
        $culturalCompanyModel = new CulturalCompany();

        $culturalCompanyData = factory(CulturalCompany::class)->make();
        foreach( $culturalCompanyData->toFillableArray() as $key => $value ) {
            $culturalCompanyModel->$key = $value;
        }
        $culturalCompanyModel->save();

        $this->assertNotNull(CulturalCompany::find($culturalCompanyModel->id));
    }

}
