<?php namespace App\Libraries;
class Config_lib
{
	protected $session;
  	function __construct(){
			$this->session = \Config\Services::session();
	}
	/*Obtiene el filtro de busquedas del modulo usuarios de su cookie*/
	function get_filtro_users(){
		if($this->session->get('filtro_users')===null)$this->set_filtro_users("user");
		return $this->session->get('filtro_users');
	}
	/*Guarda el filtro de busquedas del modulo usuarios en su cookie*/
	function set_filtro_users($filtro_data){
		$this->session->set('filtro_users',$filtro_data);
	}
}