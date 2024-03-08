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
        helper('sales');
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
            $format_data=array();
            $rawData = $this->request->getRawInput();
           $report_data=$this->Sale->do_report($rawData);
           $format_data["headers"]=array("Sucursal","Semana Anterior","Presupuesto"," Semana Actual","Diferencia");
         //  $format_data["rows"]=$report_data;
         $format_data["rows"]=array();
           foreach($report_data as $report){
                $sucursal=preg_replace('/\/\d+\s*/', '', $report->name);
                $amount=floatval($report->amount_total);
               // var_dump($sucursal);
              //  var_dump($amount);
            
                if (array_key_exists(url_title($sucursal), $format_data['rows'])) {
                  
                    $format_data['rows'][url_title($sucursal)]+=$amount;
                  
                }else{
                    $format_data['rows'][url_title($sucursal)]=$amount;
                }
                
           }
          $report_html=get_table_report($format_data);
        //  var_dump($format_data);
          //var_dump($report_data);
         echo json_encode(array('success'=>true,'report'=>$report_html));
        }

    }

}