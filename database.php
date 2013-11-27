<?php

class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = 'BCdDwsd1db6';
    private $db = 'smktest';

    private $mysql;
    private static $instance;

    private function __construct() {
        $this->mysql = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) or die ("No database connection :(");

    }
    private function __clone() {}

    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function checkLogin($login) {
        $query = "SELECT * FROM users WHERE login = '$login'";
        $res = mysqli_query($this->mysql, $query);
        if(mysqli_num_rows($res) == 0) return true;
        return false;
    }

    public function addToDb($arr) {
        foreach($arr as $i) {
            mysqli_real_escape_string($this->mysql, $i);
        }
        $arr->pwd = sha1(sha1($arr->pwd));
        $query = "INSERT INTO users (login, password, fname, sname, email, phone, birthdate) VALUES ('$arr->login', '$arr->pwd',
            '$arr->fname', '$arr->sname', '$arr->email', '$arr->phone', '$arr->bdate')";
  
        $res = mysqli_query($this->mysql, $query);
    }
    
    public function updateProfile($id, $arr) {
        foreach($arr as $i) {
            mysqli_real_escape_string($this->mysql, $i);
        }
        $arr->pwd = sha1(sha1($arr->pwd));
        $query = "UPDATE users SET password = '$arr->pwd', fname = '$arr->fname',"
                    . "sname = '$arr->sname', email = '$arr->email', phone = '$arr->phone',"
                    . "birthdate = '$arr->bdate' WHERE id = '$id'";
        $res = mysqli_query($this->mysql, $query);
    }

    public function loginUser($login, $pwd) {
        $pwd = sha1(sha1($pwd));
        $query = "SELECT id FROM users WHERE login = '$login' AND password = '$pwd'";
        $res = mysqli_query($this->mysql, $query);
        // returns id if logged in or -1 if not
        if(mysqli_num_rows($res) > 0) {
            $ret = mysqli_fetch_row($res);
            return $ret[0];
        }
        return -1;
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $res = mysqli_query($this->mysql, $query);
        if(!$res) {
            return -1;
        }
        else {
            $ret = array();
            while($row = mysqli_fetch_assoc($res)) {
                $ret[] = $row;
            }
            return $ret;
        }
    }
    
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = '$id'";
        $res = mysqli_query($this->mysql, $query);
    }
} 