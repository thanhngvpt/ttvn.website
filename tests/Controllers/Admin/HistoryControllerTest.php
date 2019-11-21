<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class HistoryControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\HistoryController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\HistoryController::class);
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
        $response = $this->action('GET', 'Admin\HistoryController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\HistoryController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $history = factory(\App\Models\History::class)->make();
        $this->action('POST', 'Admin\HistoryController@store', [
                '_token' => csrf_token(),
            ] + $history->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $history = factory(\App\Models\History::class)->create();
        $this->action('GET', 'Admin\HistoryController@show', [$history->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $history = factory(\App\Models\History::class)->create();

        $name = $faker->name;
        $id = $history->id;

        $history->name = $name;

        $this->action('PUT', 'Admin\HistoryController@update', [$id], [
                '_token' => csrf_token(),
            ] + $history->toArray());
        $this->assertResponseStatus(302);

        $newHistory = \App\Models\History::find($id);
        $this->assertEquals($name, $newHistory->name);
    }

    public function testDeleteModel()
    {
        $history = factory(\App\Models\History::class)->create();

        $id = $history->id;

        $this->action('DELETE', 'Admin\HistoryController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkHistory = \App\Models\History::find($id);
        $this->assertNull($checkHistory);
    }

}
