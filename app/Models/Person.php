<?php namespace App\Models;
use CodeIgniter\Model;
class Person extends Model
{
  protected $db;
  
	/*Se inicia el constructor*/
  function __construct(){
    $this->db=  \Config\Database::connect();

  }
}