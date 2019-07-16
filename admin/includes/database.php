<?php

require_once "config.php";
class Database {


    private $connection;


    public function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection()
    {
//        $this->connection = mysqli_connect(DB_host,DB_USER,DB_PASS,DB_NAME);

        $this->connection = new mysqli(DB_host,DB_USER,DB_PASS,DB_NAME);

        if ($this->connection->connect_errno)
        {
            die('connection falied '.$this->connection->connect_error);
        }

    }

    public function query($sql)
    {
//        $result = mysqli_query($this->connection,$sql);
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }


    private function confirm_query ($result)
    {

        if (!$result)
        {
            die('query failed' . $this->connection->error);
        }
    }


    public function escape_string($stirng)
    {
//        $escaped_string = mysqli_real_escape_string($this->connection,$stirng);
        $escaped_string = $this->connection->real_escape_string($stirng);
        return $escaped_string;
    }

    public function the_insert_id()
    {
        return $this->connection->insert_id;
    }



}

$database = new Database();

