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
      $decrypt_cle=$encrypter->decrypt($user_info->cle);
      $decrypt_hashed_password=$encrypter->decrypt($user_info->password,['key' => $decrypt_cle]);
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
}