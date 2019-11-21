<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class HeadingControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\HeadingController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\HeadingController::class);
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
        $response = $this->action('GET', 'Admin\HeadingController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\HeadingController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $heading = factory(\App\Models\Heading::class)->make();
        $this->action('POST', 'Admin\HeadingController@store', [
                '_token' => csrf_token(),
            ] + $heading->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $heading = factory(\App\Models\Heading::class)->create();
        $this->action('GET', 'Admin\HeadingController@show', [$heading->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $heading = factory(\App\Models\Heading::class)->create();

        $name = $faker->name;
        $id = $heading->id;

        $heading->name = $name;

        $this->action('PUT', 'Admin\HeadingController@update', [$id], [
                '_token' => csrf_token(),
            ] + $heading->toArray());
        $this->assertResponseStatus(302);

        $newHeading = \App\Models\Heading::find($id);
        $this->assertEquals($name, $newHeading->name);
    }

    public function testDeleteModel()
    {
        $heading = factory(\App\Models\Heading::class)->create();

        $id = $heading->id;

        $this->action('DELETE', 'Admin\HeadingController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkHeading = \App\Models\Heading::find($id);
        $this->assertNull($checkHeading);
    }

}
