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
                    'confirm' => currentUser()->confirm,
                    'confirm_code' => currentUser()->confirm_code
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
        $img = new Images();
        if(isset($_REQUEST['delete'])){
            $img->delete($_REQUEST['delete']);
        }
        $this->view->render('account/gallery');
    }

    public function editAction(){
        if($_POST){
            $img_dir = "uploads/";
            $name = substr(uniqid(), 0, 9).".png";;
            $img_name = $img_dir.$name;
            $original        =    $_POST['img'];
            $ac1        =    $_POST['ac1'];
            $ac2        =    $_POST['ac2'];
            $ac3        =    $_POST['ac3'];
            $submit        =    $_POST['submit'];
            $sticker1    =    "img/sticker_1.png";
            $sticker2    =    "img/sticker_2.png";
            $sticker3    =    "img/sticker_3.png";

            if ($submit != "OK"){
                echo 'No Submit!';
                exit();
            }
            if (empty($original || empty($ac1) || empty($ac2) || empty($ac3))){
                echo 'No data!';
                exit();
            }
            $original = str_replace(" ", "+", $original);
            $original = str_replace("data:image/png;base64,", "", $original);
            $original = base64_decode($original);
            $original = imagecreatefromstring($original);
            imagepng($original, 'tmp.png');
            if ($ac1 == 1){
                $sticker = imagecreatefrompng($sticker1);
                $original = imagecreatefrompng('tmp.png');
                imagesavealpha($original, true);
                imagealphablending($original, true);
                $sticker = imagescale($sticker, 400, 300);
                imagesavealpha($sticker, true);
                imagecopy($original, $sticker, 0, 0, 0, 0, 400, 300);
                imagepng($original, 'tmp.png'); 
                imagedestroy($sticker);
            }
            if ($ac2 == 1){    
                $sticker = imagecreatefrompng($sticker2);
                $original = imagecreatefrompng('tmp.png');
                imagesavealpha($original, true);
                imagealphablending($original, true);
                $sticker = imagescale($sticker, 400, 300);
                imagealphablending($sticker, true);
                imagesavealpha($sticker, true);
                imagecopy($original, $sticker, 0, 0, 0, 0, 400, 300);
                imagepng($original, 'tmp.png');
                imagedestroy($sticker);
            }
            if ($ac3 == 1){
                $sticker = imagecreatefrompng($sticker3);
                $original = imagecreatefrompng('tmp.png');
                imagesavealpha($original, true);
                imagealphablending($original, true);
                $sticker = imagescale($sticker, 400, 300);
                imagealphablending($sticker, true);
                imagesavealpha($sticker, true);
                imagecopy($original, $sticker, 0, 0, 0, 0, 400, 300);
                imagepng($original, 'tmp.png');
                imagedestroy($sticker);
            }
            if (copy('tmp.png', $img_name)){
                $img = new Images();
                $img->insert([
                    'user_id' => currentUser()->id,
                    'image' => $img_name
                ]);
                echo "File uploaded!\n";
                unlink("./tmp.png");
            }
            else {
                echo "Something Went Wrong!\n File failed to upload!";
                exit();
            }

        }
        $this->view->render('account/edit');
    }

}