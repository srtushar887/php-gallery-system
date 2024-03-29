<?php


class Db_object {

    public static function find_all()
    {
//        global $database;
//
//        $result_set = $database->query("SELECT * FROM users");
//        return $result_set;


        return static::find_by_query("SELECT * FROM " . static::$db_name ." ");

    }


    public static function find_by_id($user_id)
    {
        global $database;

//        $result_set = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
//        $found_user = mysqli_fetch_array($result_set);


        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_name ." WHERE id = $user_id LIMIT 1");


        if (!empty($the_result_array))
        {
            $first_item = array_shift($the_result_array);
            return $first_item;
        }else{
            return false;
        }

    }


    public static function find_by_query ($sql)
    {
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result)){
            $the_object_array[] = static::instantation($row);
        }
        return $the_object_array;
    }

    public static function instantation ($the_record)
    {
        $caling_class = get_called_class();
        $the_object = new $caling_class;
//        $the_object->username = $found_user['username'];
//        $the_object->password = $found_user['password'];
//        $the_object->first_name = $found_user['first_name'];
//        $the_object->last_name = $found_user['last_name'];


        foreach ($the_record as $the_attribute => $value)
        {
            if ($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }


        return $the_object;
    }

    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);


    }



    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    protected function properties()
    {
//        return get_object_vars($this);
        $properties = array();
        foreach (static::$db_fileds as $db_fld)
        {
            if (property_exists($this,$db_fld)){
                $properties[$db_fld] = $this->$db_fld;
            }
        }

        return $properties;
    }


    protected function clean_properties()
    {
        global $database;

        $clean_properties = array();
        foreach ($this->properties() as $key => $value){
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }


    public function create()
    {
        global $database;

        $properties = $this->clean_properties();


//        $sql = "INSERT INTO " . self::$db_name . " (username,password,first_name,last_name) ";

        $sql = "INSERT INTO " . static::$db_name . " (". implode(",",array_keys($properties)) .") ";
        $sql .= " VALUES ('". implode("','",array_values($properties)) ."')";



//        $sql .= $database->escape_string($this->username) . "', '";
//        $sql .= $database->escape_string($this->password) . "', '";
//        $sql .= $database->escape_string($this->first_name) . "', '";
//        $sql .= $database->escape_string($this->last_name) . "')";

        if ($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }



    }


    public function update()
    {
        global $database;

        $properties = $this->clean_properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value)
        {
            $properties_pairs[] = "{$key}='{$value}' ";
        }


        $sql = "UPDATE " . static::$db_name . " SET ";
        $sql .= implode(",",$properties_pairs);
        $sql .= " WHERE id= ".$database->escape_string($this->id);


//        $sql .= "username = '".$database->escape_string($this->username) . "', ";
//        $sql .= "password = '".$database->escape_string($this->password) . "', ";
//        $sql .= "first_name = '".$database->escape_string($this->first_name) . "', ";
//        $sql .= "last_name = '".$database->escape_string($this->last_name) . "' ";
//        $sql .= " WHERE id= ".$database->escape_string($this->id);

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1 ? true : false);
    }

    public function delete()
    {
        global $database;
        $sql = "DELETE FROM " . static::$db_name . " ";
        $sql .= "WHERE id = ". $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1 ? true : false);
    }

}