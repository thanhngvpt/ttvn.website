<?php namespace Tests\Models;

use App\Models\Company;
use Tests\TestCase;

class CompanyTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Company $company */
        $company = new Company();
        $this->assertNotNull($company);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Company $company */
        $companyModel = new Company();

        $companyData = factory(Company::class)->make();
        foreach( $companyData->toFillableArray() as $key => $value ) {
            $companyModel->$key = $value;
        }
        $companyModel->save();

        $this->assertNotNull(Company::find($companyModel->id));
    }

}
