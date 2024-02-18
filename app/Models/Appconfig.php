<?php namespace App\Models;
use CodeIgniter\Model;
class Appconfig extends Model
{
    protected $db;
    function __construct(){
        $this->db=  \Config\Database::connect('default');
    }
    /*Recupera datos de app_config y pasa los datos a $config_array con índice de key y su valor */
	function get_info(){
    	$builder=$this->db->table('app_config');
		$builder->orderBy("key","asc");
		$query =$builder->get();
		$config_array=array();
		foreach ($query->getResultArray() as $row){
		    $config_array[$row['key']]=$row['value'];
		}
		return $config_array;
	}
}