<?php namespace App\Models;
use CodeIgniter\Model;
class User extends Person
{

    protected $db;
    function __construct(){
        $this->db=  \Config\Database::connect();
    }

    /*Recupera la cantidad de usuarios resultado numérico*/
	function count_all(){
		$builder=$this->db->table('users');
		$builder->where('deactivate',0);
		return $builder->countAllResults();
	}
    	/*Recupera todos los datos de usuario y persona (unión por person_id), ordenado por person_id o last_name. aplicando limit y offset para mostrar una cantidad controlable */
	function get_all($filtro,$limit=10000, $offset=0){
        $Appconfig = model('App\Models\Appconfig');
           $config_info=$Appconfig->get_info();
              if($offset===null)$offset=0;
           if($filtro=="user" ){
               $filtro="users.person_id";
           }
           $builder=$this->db->table('users');
           $builder->where('deactivate',0);
           $builder->where('users.person_id!=',$config_info['main_user_id']);
           $builder->join('people','users.person_id=people.person_id');
           $builder->orderBy('users.person_id', "asc");
           $builder->limit($limit);
           $builder->offset($offset);
           return $builder->get();
       }
       /*Obtiene información sobre usuario mediante búsqueda de id(user_id)*/
	function get_info($user_id){
        $builder=$this->db->table('users');
        $builder->where('users.person_id',$user_id);
     $builder->join('people', 'people.person_id = users.person_id');
     $query = $builder->get();
     if($query->getNumRows()==1){
         return $query->getRow();
     }
     else{
         /*$persona_obj recupera un objeto vació ya que no hay usuario con $user_id*/
         $person_obj=parent::get_info(-1);
         /*Obtener todos los campos de la tabla users*/
         $fields = $query->getFieldNames();
         /*añadimos campos de $fields al objeto de $person_obj el cual esta vació*/
         foreach ($fields as $field)
         {
             $person_obj->$field='';
         }
         return $person_obj;
     }
 }

}