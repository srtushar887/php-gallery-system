<?php


class Photo extends Db_object {

    protected static $db_name = "photos";
    protected static $db_fileds = array('title','description','filename','type','size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;




}