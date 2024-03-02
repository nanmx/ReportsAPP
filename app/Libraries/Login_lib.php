<?php namespace App\Libraries;
class Login_lib
{
  protected $session;
  protected $Privatezone;
  protected $User;
	function __construct(){
        $this->session = \Config\Services::session();
        $this->Privatezone = model('App\Models\Privatezone');
        $this->User = model('App\Models\User');
    }
    function login_check($user,$password){
      $credenciales=array('username'=>$user,'password'=>$password);
      $logged_user=$this->Privatezone->login($credenciales);
      if($logged_user!==false){
        $user_data=array(
          'person_id'  =>  $logged_user->person_id,
          'nombre'	=>	$this->Privatezone->get_user_complete_info($logged_user->person_id)->first_name
          );
          $this->session->set('user_data',$user_data);
          return true;
      }
      else{
        return false;
      }

    }
    /**/
	function get_user_id(){
    $user_data=$this->session->get('user_data');
    if(!empty($user_data)){
      return $user_data['person_id'];
    }else{
      return false;
    }
  }
   /*Checa si el usuario esta logeado*/
   function is_user_login(){
    if($this->session->has('user_data')){
        $user_data=$this->session->get('user_data');
      //  $data_base_info=$this->Privatezone->get_database_info($user_data['person_id']);
        $user_info=$this->User->get_info($user_data['person_id']);
        if($user_info->person_id==$user_data['person_id'] ){
          return true;
        }else {
          $this->session->destroy();
          return false;
        }
    }
    else{
      return false;
    }
  }
    /**/
	function logout(){
		if(!$this->session->destroy()) {
	     return false;
		}
	}
}
?>