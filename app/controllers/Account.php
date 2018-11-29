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
            $validation->check($_POST, [
                'fname' => [
                    'display' => 'First Name'
                ],
                'lname' => [
                    'display' => 'Last Name'
                ],
                'username' => [
                    'display' => 'Username',
                    'unique' => 'users',
                    'min' => 6,
                    'max' => 150
                ],
                'email'=> [
                    'display' => 'Email',
                    'unique' => 'users',
                    'max' => 150,
                    'valid_email' => true
                ],
                'password'=> [
                    'display' => 'Password',
                    'min' => 6
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    'matches' => 'password'
                ] 
            ]);

            if(empty($_POST['fname'])){
                $_POST['fname'] = currentUser()->fname;
            }    
            if(empty($_POST['lname'])){
                $_POST['lname'] = currentUser()->lname;
            }
            if(empty($_POST['username'])){
                $_POST['username'] = currentUser()->username;
            }
            if(empty($_POST['email'])){
                $_POST['email'] = currentUser()->email;
            }
            if(empty($_POST['password'])){
                $_POST['password'] = currentUser()->password;
            }else {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }

            if($validation->passed()){
                $default = [
                    'confirm' => 1,
                    'notify' => currentUser()->notify,
                    'confirm_code' => ''
                ];
                $newUser = new Users();
                $newUser->updateUser(currentUser()->id, $_POST, $default);
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