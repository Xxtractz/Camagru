<?php
class Register extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller,$action);
    }

    public function loginAction()
    {
      $this->view->render('home/index');
    }
}