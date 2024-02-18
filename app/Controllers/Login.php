<?php
namespace App\Controllers;
class Login extends Private_area
{
    public function index(): string
    {
        
        $data['config_info']=  $this->config_info;
        return view('login',$data);
    }
}
