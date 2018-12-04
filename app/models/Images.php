<?php
class Images extends Model{
    public function __construct($user=''){
        $table = 'images';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete = true;
        if ($user != ''){
            if(is_int($user)){
                $u = $this->_db->findFirst("users", ["conditions"=>"id = ?", "bind"=>[$user]]);
            } else{
                $u = $this->_db->findFirst("users", ["conditions"=>"username = ?", "bind"=>[$user]]);
            } 
        }
        if(!empty($u)){
            foreach ($u as $key => $value) {
                $this->$key = $value;
            }
        }
    }
}