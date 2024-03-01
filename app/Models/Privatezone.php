<?php namespace App\Models;
use CodeIgniter\Model;
class Privatezone extends Model
{
  protected $db;
  function __construct(){
    $this->db=  \Config\Database::connect('default');
  }

  function login($credenciales){
    $pepper = $this->get_pepper();
    $builder=$this->db->table('users');
		$builder->where('username', $credenciales['username']);
    $query = $builder->get();
    if($query->getNumRows()==1){
			$user_info = $query->getRow();
      $user_info->cle;
      $encrypter = \Config\Services::encrypter();
      $decrypt_cle=$user_info->cle;
      $decrypt_hashed_password=$user_info->password;
      $input_hashed_password=hash_hmac("sha256",$credenciales['password'],$pepper);
      if(password_verify($input_hashed_password, $decrypt_hashed_password)){
        return $user_info;
      }else{
        return false;
      }
		}
		else{
      return false;
	 }

  }

  function get_pepper(){
    $builder=$this->db->table('app_config');
    $query = $builder->getWhere(array('key'=>'pepper'),1);
      if($query->getNumRows()==1)
      {
        return $query->getRow()->value;
      }
      return "";
    }
     /*Obtiene la info del usuario*/
  function get_user_complete_info($person_id,$data_base_info){
    $dbc = \Config\Database::connect($data_base_info);
		$builder=$dbc->table('users');
    $builder->where('users.person_id',$person_id);
		$builder->join('people', 'people.person_id = users.person_id');
		$query = $builder->get();
		if($query->getNumRows()==1){
			return $query->getRow();
		}
		else{
			/*Obtener el objeto primario base vacío, ya que $ customer_id NO es un cliente*/
			$person_obj=new \stdClass;
			/*Obtenga todos los campos de la tabla de clientes*/
			$fields =$query->getFieldNames();
			/*agregue esos campos al objeto principal base, tenemos un objeto vacío completo*/
			foreach ($fields as $field)
			{
				$person_obj->$field='';
			}
			return $person_obj;
		}
	}
}