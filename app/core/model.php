<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2017
 * Time: 21:04
 */
class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_data()
    {
    }
}