<?php

namespace Dell\Asmphp2\Controllers\Admin;

use Dell\Asmphp2\Commons\Controller;
use Dell\Asmphp2\Commons\Helper;
use Dell\Asmphp2\Models\Contact;
use Rakit\Validation\Validator;

class ContactController extends Controller
{

    private Contact $contact;
     
    public function __construct()
    {
        $this->contact = new Contact();
        
    }
    public function index()
    {
        $contacts = $this->contact->all();

        $this->renderViewAdmin('contacts.index', [
            'contacts' => $contacts,
        ]);
        
    } 

    public function show($id)
    {
        $contact = $this->contact->findByID($id);

        $this->renderViewAdmin('contacts.show', [
            'contact' => $contact
        ]);
    
    }
}