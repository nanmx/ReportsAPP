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
		$data["user_info"]=$this->logged_in_user_info;
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
	function save($user_id=-1){
		if($this->request->isAJAX()===true){
			$rawData = $this->request->getRawInput();
			helper('password');
			$person_data = array(
				"first_name"=>$rawData["first_name"],
				"last_name"=>$rawData["last_name"]);
			$elpepe=hash_hmac("sha256",trim($this->request->getPost("password")),$this->config_info["pepper"]);
			$password_hashed=password_hash($elpepe,PASSWORD_ARGON2ID);
			$cle=get_password();
			$config         = new \Config\Encryption();
			$config->key    = $cle;
			$encrypter = \Config\Services::encrypter($config);
			$bin_encrypt_password=$password_hashed;
			$user_data["password"]= mb_convert_encoding($bin_encrypt_password,"UTF-8");
			unset($encrypter);
			$encrypter = \Config\Services::encrypter();
			$user_data["cle"]= mb_convert_encoding($cle,"UTF-8");
			$user_data["username"]=mb_convert_encoding($this->request->getPost("username"),"UTF-8","ASCII");
		
			if($user_id==-1){
				$user_data["deactivate"]=mb_convert_encoding(0,"UTF-8");
			}
		
			if($this->User->save_user($person_data,$user_data,$user_id)){
				// Nuevo usuario 
				if($user_id==-1){
					$user_id=$person_data['person_id'];
					echo json_encode(array('success'=>true,'message'=>Lang('Users.success_msj').' '.$person_data['first_name'].' '.$person_data['last_name'],'row_id'=>$user_id));
				}
				else{
					// usuario anterior 
					echo json_encode(array('success'=>true,'message'=>Lang('Users.update_msj').' '.$person_data['first_name'].' '.$person_data['last_name'],'row_id'=>$user_id));
				}
			}
			else{
				//Error 
				echo json_encode(array('success'=>false,'message'=>Lang('Common.form_error').' '.
				$person_data['first_name'].' '.$person_data['last_name'],'person_id'=>-1));
			}
		}
	}
}