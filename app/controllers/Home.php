<?php
class Home extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller,$action);
    }

    public function indexAction(){
        $img = new Images();
        $user = new Users();
        if(isset($_REQUEST['like'])){
            $col = $img->findById($_REQUEST['like']);
            $img->update($_REQUEST['like'], [
                'image_like' => $col->image_like + 1
            ]);
            $email = $col->user_id;
            $send = $user->findById($email);
            if ($send->notify === 1)
                SendMail::like($send->email);
            Router::redirect('');
        }
        $this->view->render('home/index');
    }
}
