<?php namespace App\Models;
use CodeIgniter\Model;
class Module extends Model
{
  protected $db;
  function __construct(){
        $this->db=  \Config\Database::connect();
    }
    /*Obtiene todos los datos de todos los módulos*/
	function get_all_modules(){
		$builder=$this->db->table('modules');
		$builder->orderBy("sort", "asc");
		return $builder->get();
	}
}