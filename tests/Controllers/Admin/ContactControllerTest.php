<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class ContactControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\ContactController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\ContactController::class);
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
        $response = $this->action('GET', 'Admin\ContactController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\ContactController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $contact = factory(\App\Models\Contact::class)->make();
        $this->action('POST', 'Admin\ContactController@store', [
                '_token' => csrf_token(),
            ] + $contact->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $contact = factory(\App\Models\Contact::class)->create();
        $this->action('GET', 'Admin\ContactController@show', [$contact->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $contact = factory(\App\Models\Contact::class)->create();

        $name = $faker->name;
        $id = $contact->id;

        $contact->name = $name;

        $this->action('PUT', 'Admin\ContactController@update', [$id], [
                '_token' => csrf_token(),
            ] + $contact->toArray());
        $this->assertResponseStatus(302);

        $newContact = \App\Models\Contact::find($id);
        $this->assertEquals($name, $newContact->name);
    }

    public function testDeleteModel()
    {
        $contact = factory(\App\Models\Contact::class)->create();

        $id = $contact->id;

        $this->action('DELETE', 'Admin\ContactController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkContact = \App\Models\Contact::find($id);
        $this->assertNull($checkContact);
    }

}
