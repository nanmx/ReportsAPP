<?php namespace App\Controllers;
use App\Libraries\Config_lib;
class Users extends Private_area
{
    protected $Person;
	protected $Module;
    protected $config_lib;
    function __construct(){
		parent::__construct();
        $this->config_lib = new Config_lib();
		$this->request = \Config\Services::request();
		$this->Person = model('App\Models\Person');
		$this->Module = model('App\Models\Module');
		helper('users');
    }
    /*Carga el manage view del modulo*/
	function index(){
        $data["nav"]=$this->nav;
        $data['controller_name']=$this->controller_name;
        $total_rows = $this->User->count_all();
		$per_page = $this->config_info['paginacion'];
		$data['links']="";
		$page=$this->request->getGet('page');
		if($page===null)$page=0;
		$offset=0;
		if($page>0)$offset=$per_page*($page-1);
		if($total_rows>$per_page){
			$pager = \Config\Services::pager();
			$pager->makeLinks($page,$per_page,$total_rows,'default_full');
			$data['links']=	$pager->links();
		}
        $data['filtro']=$this->config_lib->get_filtro_users();
		$data['manage_table']=get_users_manage_table($this->User->get_all($data['filtro'],$per_page, $offset),$this->controller_name);
        echo view('users/manage', $data);
    }
}