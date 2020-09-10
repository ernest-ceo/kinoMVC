<?php


abstract class Model
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}