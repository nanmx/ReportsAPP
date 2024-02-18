<?php namespace App\Libraries;
class Login_lib
{
  protected $session;
  protected $Privatezone;
	function __construct(){
        $this->session = \Config\Services::session();
        $this->Privatezone = model('App\Models\Privatezone');
    }
}
?>