<?php
namespace App\Controllers;
class Login extends Private_area
{
    public function index(): string
    {
        
        $data['config_info']=  $this->config_info;
        return view('login',$data);
    }
    function login_validation(){
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        if($this->Login_lib->login_check($username,$password)){
        echo json_encode(array('success'=>true));
        }else{
            echo json_encode(array('success'=>true));
        }
    }
}
