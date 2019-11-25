<?php namespace Tests\Models;

use App\Models\Contact;
use Tests\TestCase;

class ContactTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Models\Contact $contact */
        $contact = new Contact();
        $this->assertNotNull($contact);
    }

    public function testStoreNew()
    {
        /** @var  \App\Models\Contact $contact */
        $contactModel = new Contact();

        $contactData = factory(Contact::class)->make();
        foreach( $contactData->toFillableArray() as $key => $value ) {
            $contactModel->$key = $value;
        }
        $contactModel->save();

        $this->assertNotNull(Contact::find($contactModel->id));
    }

}
