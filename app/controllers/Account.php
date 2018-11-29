<?php
class Account extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller,$action);
        $this->view->setLayout('default');
    }

    public function profileAction(){
        $validation = new Validate();
        $posted_values = ['fname'=>'', 'lname'=>'', 'username'=>'', 'email'=>'', 'password'=>'', 'confirm'=>''];
        
        if($_POST){
            $posted_values = posted_values($_POST); 
            if ($_POST['fname']){
                $validation->check($_POST, [
                    'fname' => [
                        'display' => 'First Name',
                        'required' => true
                    ]
                ]);
            }
            if ($_POST['lname']){
                $validation->check($_POST, [
                    'lname' => [
                        'display' => 'Last Name',
                        'required' => true
                    ]
                ]);
            }
            if ($_POST['username']){
                $validation->check($_POST, [
                    'username' => [
                        'display' => 'Username',
                        'required' => true,
                        'unique' => 'users',
                        'min' => 6,
                        'max' => 150
                    ]]);
            }
            if ($_POST['email']){
                $validation->check($_POST, [
                    'email'=> [
                        'display' => 'Email',
                        'required' => true,
                        'unique' => 'users',
                        'max' => 150,
                        'valid_email' => true
                    ]]);
            }
            if ($_POST['password']){
                $validation->check($_POST, [
                    'password'=> [
                        'display' => 'Password',
                        'required' => true,
                        'min' => 6
                    ],
                    'confirm' => [
                        'display' => 'Confirm Password',
                        'required' => true,
                        'matches' => 'password'
                    ]]);
            }
            if($validation->passed()){
                $newUser = new Users();
                $newUser->updateUser($_POST);
                Router::redirect('register/login');
            }
        }
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('account/profile');
    }

    public function galleryAction(){
        $this->view->render('account/gallery');
    }

    public function editAction(){
        $this->view->render('account/edit');
    }

}