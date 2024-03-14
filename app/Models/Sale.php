<?php namespace App\Models;
use CodeIgniter\Model;
use App\Libraries\Login_lib;
class Sale extends Model
{
    protected $db;
    protected $Login_lib;
    function __construct(){
        $this->Login_lib = new Login_lib();
        $conection=$this->Login_lib->get_data_conection();
        $this->db=  \Config\Database::connect($conection);
    }
    function do_report($data){
        $choosed=$data['choosed'];
        $current_week=$data['current_week'];
        $last_week=$data['last_week'];
        $current_week=str_replace('_', ' ',$current_week);
        $current_week=str_replace(".", "' and '",$current_week);
        $last_week=str_replace('_', ' ',$last_week);
        $last_week=str_replace(".", "' and '",$last_week);
        
        $data_report=array();
       switch($choosed){
            case 'kgs':
                $data_report['current']=  $this->kgs_saled_report($current_week,'current');
                $data_report['last']=  $this->kgs_saled_report($last_week,'last');
                break;
            case 'sales':
                $data_report['current']=$this->sales_report($current_week,'current');
                $data_report['last']=$this->sales_report($last_week,'last');
                break;
            case 'price':
                $this->price_average_report();
                break;
            case 'cost':
                $this->cost_average_report();
                break;
            case 'profit':
                $this->profit_report();
                break;
            

        }
        
        return $data_report;

    }
    function kgs_saled_report($fecha,$type, $offset=0, $limit=100){
       
        $fecha="write_date BETWEEN '$fecha'";
        $builder=$this->db->table('pos_order_line');
        $builder->select('name, qty as amount_'.$type);

        $builder->where($fecha);
        $builder->orderBy('name');
        /*$builder->limit($limit);
		$builder->offset($offset);*/
		return $builder->get()->getResultArray();

    }
    function sales_report($fecha, $type, $offset=0, $limit=100){
       
        $fecha="write_date BETWEEN '$fecha'";
        $builder=$this->db->table('sale_order');
        $builder->select("name, amount_total as amount_$type");
        $builder->where('state!=','cancel');
        $builder->where($fecha);
        $builder->orderBy('name');
        /*$builder->limit($limit);
		$builder->offset($offset);*/
		return $builder->get()->getResultArray();

    }
    function price_average_report(){

    }   
    function cost_average_report(){

    } 
    function profit_report(){

    }
}