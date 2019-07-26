<?php

class User extends Db_object {

    protected static $db_name = "users";
    protected static $db_fileds = array('username','password','first_name','last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;




    public static function verify_user($username,$password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_name ." WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);


        if (!empty($the_result_array))
        {
            $first_item = array_shift($the_result_array);
            return $first_item;
        }else{
            return false;
        }


    }







}



