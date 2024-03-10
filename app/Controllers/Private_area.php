<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Login_lib;
class Private_area extends BaseController
{
    public $Login_lib;  
	protected $config_info;
	protected $allowed_modules;
    public $User;
    public $logged_in_user_info;
	protected $controller_name;
    public $nav;
    function __construct(){
        $this->Login_lib = new Login_lib();
        helper(['nav']);
		$Appconfig = model('App\Models\Appconfig');
        $this->config_info=$Appconfig->get_info();
        $Module = model('App\Models\Module');
        $this->User = model('App\Models\User');
        $router = service('router');
        $this->request = \Config\Services::request();
        $uri = $this->request->getUri();
        $this->controller_name  = $router->controllerName();
		$this->controller_name  =stripslashes(str_replace("\App\Controllers","",$this->controller_name));
        //  $this->nav=nav($Module->get_allowed_modules($this->Login_lib->get_user_id()),$this->Login_lib);
        $this->nav=nav($Module->get_all_modules(),$this->Login_lib);
        $user_id=$this->Login_lib->get_user_id();
        if($user_id==false)$user_id=-1;
         $this->logged_in_user_info=$this->User->get_info($user_id);
         
       //return redirect()->route('/');
        if($this->Login_lib->is_user_login() ===false && site_url(uri_string())!== base_url()  ){
            header("Location: ".base_url(),true,308);
           
            //return redirect()->route('Login');
        } 
    
    }
}
