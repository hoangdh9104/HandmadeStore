<?php

namespace Dell\Asmphp2\Controllers\Client;

use Dell\Asmphp2\Commons\Controller;
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
        $this->renderViewClient('contact');
    }
        
    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'phone'                 => 'required|numeric',
            'address'               => 'required',
            'content'               => 'required',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('contact'));
            exit;
        } else {
            $data = [
                'name'     => $_POST['name'],
                'phone'    => $_POST['phone'],
                'address'  => $_POST['address'],
                'content'  => $_POST['content'],
            ];

            $this->contact->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('contact'));
            exit;
        }
    }

} 