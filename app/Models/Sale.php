<?php namespace App\Models;
use CodeIgniter\Model;
class Sale extends Model
{
    protected $db;
    function __construct(){
        $this->db=  \Config\Database::connect();
    }

    
}