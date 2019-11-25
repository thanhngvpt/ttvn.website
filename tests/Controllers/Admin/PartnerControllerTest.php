<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class PartnerControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\PartnerController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\PartnerController::class);
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
        $response = $this->action('GET', 'Admin\PartnerController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\PartnerController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $partner = factory(\App\Models\Partner::class)->make();
        $this->action('POST', 'Admin\PartnerController@store', [
                '_token' => csrf_token(),
            ] + $partner->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $partner = factory(\App\Models\Partner::class)->create();
        $this->action('GET', 'Admin\PartnerController@show', [$partner->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $partner = factory(\App\Models\Partner::class)->create();

        $name = $faker->name;
        $id = $partner->id;

        $partner->name = $name;

        $this->action('PUT', 'Admin\PartnerController@update', [$id], [
                '_token' => csrf_token(),
            ] + $partner->toArray());
        $this->assertResponseStatus(302);

        $newPartner = \App\Models\Partner::find($id);
        $this->assertEquals($name, $newPartner->name);
    }

    public function testDeleteModel()
    {
        $partner = factory(\App\Models\Partner::class)->create();

        $id = $partner->id;

        $this->action('DELETE', 'Admin\PartnerController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkPartner = \App\Models\Partner::find($id);
        $this->assertNull($checkPartner);
    }

}
