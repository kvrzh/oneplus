<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2017
 * Time: 23:48
 */
class Model_Main extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_news()
    {
        $query = $this->db->query('SELECT id, Text, image, Date FROM news');
        return $query->fetchAll();
    }
}