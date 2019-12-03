<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\User\ContactRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(ContactRequest $request)
    {
        $contact = new Contact;
        $data = $request->only(['name', 'email', 'phone', 'content']);
        $contact->fill($data);
        $contact->save();
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json('success');
        }
        
        return 'success';
    }
}
