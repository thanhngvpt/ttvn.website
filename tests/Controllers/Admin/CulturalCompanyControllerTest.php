<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class CulturalCompanyControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\CulturalCompanyController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\CulturalCompanyController::class);
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
        $response = $this->action('GET', 'Admin\CulturalCompanyController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\CulturalCompanyController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $culturalCompany = factory(\App\Models\CulturalCompany::class)->make();
        $this->action('POST', 'Admin\CulturalCompanyController@store', [
                '_token' => csrf_token(),
            ] + $culturalCompany->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $culturalCompany = factory(\App\Models\CulturalCompany::class)->create();
        $this->action('GET', 'Admin\CulturalCompanyController@show', [$culturalCompany->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $culturalCompany = factory(\App\Models\CulturalCompany::class)->create();

        $name = $faker->name;
        $id = $culturalCompany->id;

        $culturalCompany->name = $name;

        $this->action('PUT', 'Admin\CulturalCompanyController@update', [$id], [
                '_token' => csrf_token(),
            ] + $culturalCompany->toArray());
        $this->assertResponseStatus(302);

        $newCulturalCompany = \App\Models\CulturalCompany::find($id);
        $this->assertEquals($name, $newCulturalCompany->name);
    }

    public function testDeleteModel()
    {
        $culturalCompany = factory(\App\Models\CulturalCompany::class)->create();

        $id = $culturalCompany->id;

        $this->action('DELETE', 'Admin\CulturalCompanyController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkCulturalCompany = \App\Models\CulturalCompany::find($id);
        $this->assertNull($checkCulturalCompany);
    }

}
