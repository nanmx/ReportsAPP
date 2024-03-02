<?php namespace App\Controllers;
class Home extends Private_area
{
    protected $config_lib;
    function __construct(){
		parent::__construct();
        
    }
    function index(){
        $data["nav"]=$this->nav;
        $data['controller_name']=$this->controller_name;
		$data["user_info"]=$this->logged_in_user_info;
        echo view('home', $data);

    }
    /*Cierra la sesión de usuario actual*/
	function logout(){
		try {
			$this->Login_lib->logout();
			  header("Location: ".base_url(),true,308);
		}
		catch (\Exception $e) {
			log_message('error', "| Home->logout ".$e->getMessage());
		}
		header("Location: /Login",true,308);
	}
}
?>