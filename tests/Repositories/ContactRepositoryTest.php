<?php namespace Tests\Repositories;

use App\Models\Contact;
use Tests\TestCase;

class ContactRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\ContactRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ContactRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $contacts = factory(Contact::class, 3)->create();
        $contactIds = $contacts->pluck('id')->toArray();

        /** @var  \App\Repositories\ContactRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ContactRepositoryInterface::class);
        $this->assertNotNull($repository);

        $contactsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Contact::class, $contactsCheck[0]);

        $contactsCheck = $repository->getByIds($contactIds);
        $this->assertEquals(3, count($contactsCheck));
    }

    public function testFind()
    {
        $contacts = factory(Contact::class, 3)->create();
        $contactIds = $contacts->pluck('id')->toArray();

        /** @var  \App\Repositories\ContactRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ContactRepositoryInterface::class);
        $this->assertNotNull($repository);

        $contactCheck = $repository->find($contactIds[0]);
        $this->assertEquals($contactIds[0], $contactCheck->id);
    }

    public function testCreate()
    {
        $contactData = factory(Contact::class)->make();

        /** @var  \App\Repositories\ContactRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ContactRepositoryInterface::class);
        $this->assertNotNull($repository);

        $contactCheck = $repository->create($contactData->toFillableArray());
        $this->assertNotNull($contactCheck);
    }

    public function testUpdate()
    {
        $contactData = factory(Contact::class)->create();

        /** @var  \App\Repositories\ContactRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ContactRepositoryInterface::class);
        $this->assertNotNull($repository);

        $contactCheck = $repository->update($contactData, $contactData->toFillableArray());
        $this->assertNotNull($contactCheck);
    }

    public function testDelete()
    {
        $contactData = factory(Contact::class)->create();

        /** @var  \App\Repositories\ContactRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\ContactRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($contactData);

        $contactCheck = $repository->find($contactData->id);
        $this->assertNull($contactCheck);
    }

}
