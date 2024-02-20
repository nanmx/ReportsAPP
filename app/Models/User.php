<?php namespace App\Models;
use CodeIgniter\Model;
class User extends Person
{

    protected $db;
    function __construct(){
        $this->db=  \Config\Database::connect();
    }

}