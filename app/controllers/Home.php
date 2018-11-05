<?php
class Home extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller,$action);
    }

    public function indexAction()
    {
      $db = DB::getInstance();
      $sql = "SELECT * FROM contacts";
      $con = $db->query($sql);
      dnd($con);
      $this->view->render('home/index');
    }
}
