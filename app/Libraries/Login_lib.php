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
      if($user_info!==false){
        $user_data=array(
          'person_id'  =>  $logged_user->person_id,
          'nombre'	=>	$this->Privatezone->get_user_complete_info($logged_user->person_id,$conection)->first_name
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
    /**/
	function logout(){
		if(!$this->session->destroy()) {
	     return false;
		}
	}
}
?>