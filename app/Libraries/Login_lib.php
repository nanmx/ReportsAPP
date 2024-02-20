<?php namespace App\Libraries;
class Login_lib
{
  protected $session;
  protected $Privatezone;
	function __construct(){
        $this->session = \Config\Services::session();
        $this->Privatezone = model('App\Models\Privatezone');
    }
    function login_check($user,$password){
      $credenciales=array('username'=>$user,'password'=>$password);
      $user_info=$this->Privatezone->login($credenciales);
      if($user_info!==false){}
      else{
        return false;
      }

    }
}
?>