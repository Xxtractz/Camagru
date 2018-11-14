<?php
class Users extends Model{

    private $_isLoggedIn;
    private $_sessionName;
    private $_cookieName;
    public static $currentLoggedInUser = null;

    public function __construct($user=''){
        $table = 'users';
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
        if($u){
            foreach ($u as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function findByUsername($username){
        return $this->_db->findFirst(["conditions"=>"username = ?", "bind"=>[$username]]);
    }

    public  function login($rememberMe=false){
        Session::set($this->_sessionName, $this->id);
        if($rememberMe){
            $hash = md5(uniqid) + rand(0, 100);
            $user_agent = Session::uagent_no_version();
            Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
            $fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
            $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
            $this->_db->insert('user_sessions', $fields);
        }
    }
}