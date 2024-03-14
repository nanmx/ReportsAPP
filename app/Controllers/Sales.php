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
        $data['current_week']=date('W').'-'.date('Y');
        echo view('sales/manage', $data);
    }
    function get_report(){
        if($this->request->isAJAX()===true){
            $format_data=array();
           
            
            $rawData = $this->request->getRawInput();
            $fecha=$rawData['date'];
            $pieces = explode("-", $fecha);
            $current_week=get_date_week($pieces[0],$pieces[1]);
            $lw=intval($pieces[0])-1;
            $last_week=get_date_week($lw,$pieces[1]);
            $request_report=array('current_week'=>$current_week['date'],'last_week'=>$last_week['date'],'choosed'=>$rawData['choosed']);
           $report_data=$this->Sale->do_report($request_report);
           $format_data["headers"]=array("Sucursal","Semana Anterior","Presupuesto"," Semana Actual","Diferencia");
         //  $format_data["rows"]=$report_data;
         $format_data["rows"]=array();
         $current=(array) $report_data['current'];
         $last=(array) $report_data['last'];
         $results=array_merge($current, $last);
         foreach($results as $result){
          $sucursal=preg_replace('/\/[A-Za-z0-9\s]*$|S\d+$/', '', $result['name']);
          if($sucursal==="")$sucursal='S';
          if (!array_key_exists(url_title($sucursal), $format_data['rows'])) {
            $format_data['rows'][url_title($sucursal)]=array('current'=>0,'last'=>0);
          }
            if(isset($result['amount_current']))$format_data['rows'][url_title($sucursal)]['current']+=floatval($result['amount_current']);
            if(isset($result['amount_last']))$format_data['rows'][url_title($sucursal)]['last']+=floatval($result['amount_last']);
         }
       /*  foreach($current as $i =>$v){
              $v['amount_last']=$last[$i]['amount_last'];
              $current [$i]=$v;
         }*/

         //  foreach($report_data['current'] as $report){
              //  $sucursal=preg_replace('/\/\d+\s*/', '', $report['name']);
                /*$amount=floatval($report['amount_current']);
               // var_dump($sucursal);
              //  var_dump($amount);
            
                if (!array_key_exists(url_title($sucursal), $format_data['rows'])) {
                  
                    $format_data['rows'][url_title($sucursal)]=array('current'=>0);
                    $format_data['rows'][url_title($sucursal)]['current']=$amount;
                  
                }else{
                    $format_data['rows'][url_title($sucursal)]['current']+=$amount;
                    
                }
                
           }*/
         //  var_dump($format_data);
           //foreach($report_data['last'] as $report){
         //   $sucursal=preg_replace('/\/\d+\s*/', '', $report->name);
         /*   $amount=floatval($report->amount);
           // var_dump($sucursal);
          //  var_dump($amount);
        
            if (!array_key_exists(url_title($sucursal), $format_data['rows'])) {
                $format_data['rows'][url_title($sucursal)]=array('last'=>0);
                $format_data['rows'][url_title($sucursal)]['last']=$amount;
              
            }else{
               if(isset($format_data['rows'][url_title($sucursal)]['last'])){
                 $format_data['rows'][url_title($sucursal)]['last']+=$amount;
               }else{
                $format_data['rows'][url_title($sucursal)]['last']=$amount;
               }
               
            }
            
       }*/
          $report_html=get_table_report($format_data,$rawData['choosed']);
        //  var_dump($format_data);
          //var_dump($report_data);
         echo json_encode(array('success'=>true,'report'=>$report_html));
        }

    }

}