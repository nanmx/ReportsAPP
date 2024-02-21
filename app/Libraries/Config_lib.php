<?php namespace App\Libraries;
class Config_lib
{
	protected $session;
  	function __construct(){
			$this->session = \Config\Services::session();
	}
}