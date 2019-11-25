<?php  namespace Tests\Controllers\Admin;

use Tests\TestCase;

class CriteriaCandidateControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Http\Controllers\Admin\CriteriaCandidateController $controller */
        $controller = \App::make(\App\Http\Controllers\Admin\CriteriaCandidateController::class);
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
        $response = $this->action('GET', 'Admin\CriteriaCandidateController@index');
        $this->assertResponseOk();
    }

    public function testCreateModel()
    {
        $this->action('GET', 'Admin\CriteriaCandidateController@create');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $criteriaCandidate = factory(\App\Models\CriteriaCandidate::class)->make();
        $this->action('POST', 'Admin\CriteriaCandidateController@store', [
                '_token' => csrf_token(),
            ] + $criteriaCandidate->toArray());
        $this->assertResponseStatus(302);
    }

    public function testEditModel()
    {
        $criteriaCandidate = factory(\App\Models\CriteriaCandidate::class)->create();
        $this->action('GET', 'Admin\CriteriaCandidateController@show', [$criteriaCandidate->id]);
        $this->assertResponseOk();
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $criteriaCandidate = factory(\App\Models\CriteriaCandidate::class)->create();

        $name = $faker->name;
        $id = $criteriaCandidate->id;

        $criteriaCandidate->name = $name;

        $this->action('PUT', 'Admin\CriteriaCandidateController@update', [$id], [
                '_token' => csrf_token(),
            ] + $criteriaCandidate->toArray());
        $this->assertResponseStatus(302);

        $newCriteriaCandidate = \App\Models\CriteriaCandidate::find($id);
        $this->assertEquals($name, $newCriteriaCandidate->name);
    }

    public function testDeleteModel()
    {
        $criteriaCandidate = factory(\App\Models\CriteriaCandidate::class)->create();

        $id = $criteriaCandidate->id;

        $this->action('DELETE', 'Admin\CriteriaCandidateController@destroy', [$id], [
                '_token' => csrf_token(),
            ]);
        $this->assertResponseStatus(302);

        $checkCriteriaCandidate = \App\Models\CriteriaCandidate::find($id);
        $this->assertNull($checkCriteriaCandidate);
    }

}
