<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2017
 * Time: 23:56
 */
class Database extends PDO
{
    public function __construct()
    {
        parent::__construct('mysql:host=localhost;dbname=1+1test', 'oneplus', 'oneplus');
    }
}