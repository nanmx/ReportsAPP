<?php namespace App\Models;
use CodeIgniter\Model;
use App\Libraries\Login_lib;
class Budget extends Model
{
    protected $db;
    protected $Login_lib;
    function __construct(){
        $this->Login_lib = new Login_lib();
       // $conection=$this->Login_lib->get_data_conection();
        $this->db=  \Config\Database::connect();
    }

    /*Determina si el presupuesto existe mediante id*/
	function exists($budget_id){
		$builder=$this->db->table('budgets');
		$builder->where('budget_id',$budget_id);
		$query = $builder->get();
		return ($query->getNumRows()==1);
	}

    /*Inserta o actualiza a un presupuesto*/
	function guardar(&$budget_data,$budget_id=false){
    	$builder=$this->db->table('budgets');
		$success=false;
		$this->db->transStart();
		if (!$budget_id or !$this->exists($budget_id)){
			$success=$builder->insert($budget_data);

		}
		else{
			$builder->where('budget_id', $budget_id);
			$success=$builder->update($budget_data);
		}
		$this->db->transComplete();
		return $success;
	}

    function get_all($filtro,$limit=10000, $offset=0){
              if($offset===null)$offset=0;
       
           $builder=$this->db->table('budgets');
           $builder->orderBy('budget_id', "asc");
           $builder->limit($limit);
           $builder->offset($offset);
           return $builder->get();
    }

    /*Recupera la cantidad de presupuestos resultado numérico*/
	function count_all(){
		$builder=$this->db->table('budgets');
		return $builder->countAllResults();
	}
}