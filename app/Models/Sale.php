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
        $data_report=array();
        switch($choosed){
            case 'kgs':
                $this->kgs_saled_report();
                break;
            case 'sales':
                $data_report=$this->sales_report();
                
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
    function kgs_saled_report(){

    }
    function sales_report(){
        $builder=$this->db->table('pos_order_line');
        $builder->limit('10');
        return $builder->get();

    }
    function price_average_report(){

    }   
    function cost_average_report(){

    } 
    function profit_report(){

    }
}