<?php
class Comment extends Model{
    public function __construct($user=''){
        $table = 'comment';
        parent::__construct($table);
    }
}