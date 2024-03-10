<?php namespace App\Models;
use CodeIgniter\Model;
class Person extends Model
{
 	 protected $db;
  
	/*Se inicia el constructor*/
  	function __construct(){
    	$this->db=  \Config\Database::connect();

 	 }
  	/*Inserta o actualiza a una persona*/
	function guardar(&$person_data,$person_id=false){
    	$builder=$this->db->table('people');
		$success=false;
		$this->db->transStart();
		if (!$person_id or !$this->exists($person_id)){
			$success=$builder->insert($person_data);
			$person_data['person_id']=$this->db->insertID();

		}
		else{
			$builder->where('person_id', $person_id);
			$success=$builder->update($person_data);
		}
		$this->db->transComplete();
		return $success;
	}
  	/*Determina si la persona existe mediante id*/
	function exists($person_id){
		$builder=$this->db->table('people');
		$builder->where('person_id',$person_id);
		$query = $builder->get();
		return ($query->getNumRows()==1);
	}
	function get_info($person_id){
		$builder=$this->db->table('people');
			$query = $builder->getWhere( ['person_id'=> $person_id], 1);
			if($query->getNumRows()==1)
			{
				return $query->getRow();
			}
			else
			{
				/*crea objeto con propiedades vacías*/
				$fields = $query->getFieldNames();
				$person_obj =new \stdClass;
				foreach ($fields as $field)
				{
					$person_obj->$field='';
				}
				return $person_obj;
			}
		}
}