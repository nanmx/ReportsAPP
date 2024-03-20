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
            var_dump($rawData);
        }
    }
}