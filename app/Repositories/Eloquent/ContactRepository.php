<?php namespace App\Repositories\Eloquent;

use \App\Repositories\ContactRepositoryInterface;
use \App\Models\Contact;

class ContactRepository extends SingleKeyModelRepository implements ContactRepositoryInterface
{

    public function getBlankModel()
    {
        return new Contact();
    }

    public function rules()
    {
        return [
        ];
    }

    public function messages()
    {
        return [
        ];
    }

}
