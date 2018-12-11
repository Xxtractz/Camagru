<?php
    function dnd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }

    function sanitize($dirty){
        return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
    }

    function currentUser(){
        return Users::currentLoggedInUser();
    }

    function posted_values($post){
        $clean_ary = [];
        foreach ($post as $key => $value) {
            $clean_ary[$key] = sanitize($value);
        }
        return $clean_ary;
    }

    function currentPage(){
        $currentPage = $_SERVER['REQUEST_URI'];
        if($currentPage == PROOT || $currentPage == PROOT.'home/index'){
            $currentPage = PROOT . 'home';
        }
        return $currentPage;
    }

    function _gettoken(){
        $str = "1234567890asdfghjklpoiuytrewqzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
        $random = substr(str_shuffle($str), 0, 12);
        return $random;
    }

    function _getpassword(){
        $str = "1234567890asdfghjklpoiuytrewqzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
        $random = substr(str_shuffle($str), 0, 8);
        return $random;
    }

    function createDB(){
        try{
            $db = new PDO("mysql:host=localhost", "root", "123456");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $sql = "CREATE DATABASE camagru";
            $db->exec($sql);
            echo "Database created successfully<br>";
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
       $db = null;
    }

    function setupDB(){
        $setup = DB::getInstance();

        $user = "CREATE TABLE `users` (
            `id` int(255) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `username` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `fname` varchar(255) NOT NULL,
            `lname` varchar(255) NOT NULL,
            `acl` int(11) DEFAULT NULL,
            `confirm` int(255) NOT NULL DEFAULT '0',
            `confirm_code` varchar(255) NOT NULL,
            `notify` int(150) NOT NULL DEFAULT '0'
          )";
        
        $setup->exec($user);

        $setup = null;
    }