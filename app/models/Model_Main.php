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

    /**
     * @return array
     */
    public function get_news($from = null)
    {
        if ($from == null) {
            $from = 0;
        }
        $query = $this->db->query('SELECT * FROM news WHERE id > ' . $from . ' LIMIT 4');
        return $query->fetchAll();
    }
}