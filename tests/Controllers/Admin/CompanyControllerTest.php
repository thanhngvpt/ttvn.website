<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class CompanyControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\CompanyController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\CompanyController::class);
        $this->assertNotNull($controller);
    }

    public function setUp()
    {
        parent::setUp();
        $authUser = \App\Models\AdminUser::first();
        $this->be($authUser, 'admins');
    }

    public function testGetList()
    {
        $response = $this->action('GET', 'Admin\CompanyController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\CompanyController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $company = factory(\App\Models\Company::class)->make();
        $this->action('POST', 'Admin\CompanyController@store', [
                '_token' => csrf_token(),
            ] + $company->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $company = factory(\App\Models\Company::class)->create();
        $this->action('GET', 'Admin\CompanyController@show', [$company->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $company = factory(\App\Models\Company::class)->create();

        $name = $faker->name;
        $id = $company->id;

        $company->name = $name;

        $this->action('PUT', 'Admin\CompanyController@update', [$id], [
                '_token' => csrf_token(),
            ] + $company->toArray());
        $this->assertResponseStatus(302);

        $newCompany = \App\Models\Company::find($id);
        $this->assertEquals($name, $newCompany->name);
    }

    public function testDeleteModel()
    {
        $company = factory(\App\Models\Company::class)->create();

        $id = $company->id;

        $this->action('DELETE', 'Admin\CompanyController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkCompany = \App\Models\Company::find($id);
        $this->assertNull($checkCompany);
    }

}
