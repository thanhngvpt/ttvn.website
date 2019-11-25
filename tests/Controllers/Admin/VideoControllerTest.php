<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class VideoControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\VideoController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\VideoController::class);
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
        $response = $this->action('GET', 'Admin\VideoController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\VideoController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $video = factory(\App\Models\Video::class)->make();
        $this->action('POST', 'Admin\VideoController@store', [
                '_token' => csrf_token(),
            ] + $video->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $video = factory(\App\Models\Video::class)->create();
        $this->action('GET', 'Admin\VideoController@show', [$video->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $video = factory(\App\Models\Video::class)->create();

        $name = $faker->name;
        $id = $video->id;

        $video->name = $name;

        $this->action('PUT', 'Admin\VideoController@update', [$id], [
                '_token' => csrf_token(),
            ] + $video->toArray());
        $this->assertResponseStatus(302);

        $newVideo = \App\Models\Video::find($id);
        $this->assertEquals($name, $newVideo->name);
    }

    public function testDeleteModel()
    {
        $video = factory(\App\Models\Video::class)->create();

        $id = $video->id;

        $this->action('DELETE', 'Admin\VideoController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkVideo = \App\Models\Video::find($id);
        $this->assertNull($checkVideo);
    }

}
