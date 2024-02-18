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
    function __construct(){
        $this->Login_lib = new Login_lib();
		$Appconfig = model('App\Models\Appconfig');
        $this->config_info=$Appconfig->get_info();
        
    }
}
