<?php namespace App\Models;
use CodeIgniter\Model;
use App\Libraries\Login_lib;
class Budget extends Model
{
    protected $db;
    protected $Login_lib;
    function __construct(){
        $this->Login_lib = new Login_lib();
        $conection=$this->Login_lib->get_data_conection();
        $this->db=  \Config\Database::connect($conection);
    }
}