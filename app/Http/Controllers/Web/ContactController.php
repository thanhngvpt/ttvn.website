<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\BaseRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(BaseRequest $request)
    {
        $contact = new Contact;
        $data = $request->only(['name', 'email', 'phone', 'content']);
        $contact->fill($data);
        $contact->save();

        
        return 'success';
    }
}
