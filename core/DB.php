<?php

    class DB
    {
        private static $_instance = null;
        private $_pdo;
        private $_query;
        private $_error = false;
        private $_result;
        private $_count = 0;
        private $_lastInsertID = null;


        private function __construct()
        {
            try{
                $this->_pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            }
            catch(PDOException $e){
                die($e->getMessage());
            }
        }

        public static function getInstance()
        {
            if(!isset(self::$_instance)){
                self::$_instance = new DB();
            }
            return self::$_instance;
        }

        public function query($sql, $params = [])
        {
            $this->_error = false;
            if($this->_query = $this->_pdo->prepare($sql)){
                $x = 1;
                if (count($params)){
                    foreach($params as $param){
                        $this->_query->bindValue($x, $param);
                        $x++;
                    }
                }
            }

            if ($this->_query->execute()){
                $this->_results = $this->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            }else {
              $this->_error = true;
            }
            return $this;
        }

        public function insert($table, $fields = [])
        {
          
        }
    }
