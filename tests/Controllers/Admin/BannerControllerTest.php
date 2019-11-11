<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class BannerControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\BannerController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\BannerController::class);
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
        $response = $this->action('GET', 'Admin\BannerController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\BannerController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $banner = factory(\App\Models\Banner::class)->make();
        $this->action('POST', 'Admin\BannerController@store', [
                '_token' => csrf_token(),
            ] + $banner->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $banner = factory(\App\Models\Banner::class)->create();
        $this->action('GET', 'Admin\BannerController@show', [$banner->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $banner = factory(\App\Models\Banner::class)->create();

        $name = $faker->name;
        $id = $banner->id;

        $banner->name = $name;

        $this->action('PUT', 'Admin\BannerController@update', [$id], [
                '_token' => csrf_token(),
            ] + $banner->toArray());
        $this->assertResponseStatus(302);

        $newBanner = \App\Models\Banner::find($id);
        $this->assertEquals($name, $newBanner->name);
    }

    public function testDeleteModel()
    {
        $banner = factory(\App\Models\Banner::class)->create();

        $id = $banner->id;

        $this->action('DELETE', 'Admin\BannerController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkBanner = \App\Models\Banner::find($id);
        $this->assertNull($checkBanner);
    }

}
