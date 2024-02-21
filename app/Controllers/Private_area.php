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
        $router = service('router');
        $this->controller_name  = $router->controllerName();
		$this->controller_name  =stripslashes(str_replace("\App\Controllers","",$this->controller_name));
        //  $this->nav=nav($Module->get_allowed_modules($this->Login_lib->get_user_id()),$this->Login_lib);
        $this->nav=nav($Module->get_all_modules(),$this->Login_lib);
    }
}
