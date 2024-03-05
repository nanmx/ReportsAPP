<?php namespace App\Controllers;
use App\Libraries\Config_lib;

class Sales extends Private_area
{
    protected $Module;
    protected $Sale;

    function __construct(){
		parent::__construct();
        $this->Module = model('App\Models\Module');
        $this->Sale = model('App\Models\Sale');
        $this->request = \Config\Services::request();
    }
     /*Carga el manage view del modulo*/
	function index(){
        $data["nav"]=$this->nav;
		$data["user_info"]=$this->logged_in_user_info;
        $data['controller_name']=$this->controller_name;
        $data['all_weeks']=get_all_date_weeks(date('Y'));
        $data['current_week']=get_date_week(date('W'),date('Y'));
        echo view('sales/manage', $data);
    }
    function get_report(){
        if($this->request->isAJAX()===true){
            $rawData = $this->request->getRawInput();
           $report_data=$this->Sale->do_report($rawData);
           var_dump($report_data->getResult());
        }

    }

}