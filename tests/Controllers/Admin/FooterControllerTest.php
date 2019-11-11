<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class FooterControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\FooterController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\FooterController::class);
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
        $response = $this->action('GET', 'Admin\FooterController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\FooterController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $footer = factory(\App\Models\Footer::class)->make();
        $this->action('POST', 'Admin\FooterController@store', [
                '_token' => csrf_token(),
            ] + $footer->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $footer = factory(\App\Models\Footer::class)->create();
        $this->action('GET', 'Admin\FooterController@show', [$footer->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $footer = factory(\App\Models\Footer::class)->create();

        $name = $faker->name;
        $id = $footer->id;

        $footer->name = $name;

        $this->action('PUT', 'Admin\FooterController@update', [$id], [
                '_token' => csrf_token(),
            ] + $footer->toArray());
        $this->assertResponseStatus(302);

        $newFooter = \App\Models\Footer::find($id);
        $this->assertEquals($name, $newFooter->name);
    }

    public function testDeleteModel()
    {
        $footer = factory(\App\Models\Footer::class)->create();

        $id = $footer->id;

        $this->action('DELETE', 'Admin\FooterController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkFooter = \App\Models\Footer::find($id);
        $this->assertNull($checkFooter);
    }

}
