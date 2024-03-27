<?php namespace App\Controllers;
use App\Libraries\Config_lib;

class Budgets extends Private_area
{
    protected $Module;
    protected $Budget;

    function __construct(){
		parent::__construct();
        $this->Module = model('App\Models\Module');
        $this->Budget = model('App\Models\Budget');
        $this->request = \Config\Services::request();
        helper('budgets');
    }
     /*Carga el manage view del modulo*/
	function index(){
        $data["nav"]=$this->nav;
		$data["user_info"]=$this->logged_in_user_info;
        $data['controller_name']=$this->controller_name;
        $data['years']= get_next_years();
        $data['months']= get_next_months();
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
        $data['manage_table']=get_table_budgets($this->Budget->get_all($per_page, $offset),$this->controller_name);
        echo view('budgets/manage', $data);

    }
    function save($budget_id=-1){
		if($this->request->isAJAX()===true){
            $rawData = $this->request->getRawInput();
            $budget_id_int = 0;
            $cadena=$rawData['sucursal'].$rawData['type'];
            for ($i = 0; $i < strlen($cadena); $i++) {
                // Sumar el valor ASCII de cada carácter
                $budget_id_int += ord($cadena[$i]);
            }
            $rawData['budget_id']=$rawData['year'].$rawData['month'].$budget_id_int;
            if( $this->Budget->guardar($rawData)){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
        }
    }
}