<?php
if ( ! function_exists('get_password')){
	/*Nos Genera una contraseña*/
	function get_password($tipo = 3, $password_length = 12){
		$allow_chars="";
		$password = "";
		/*Tipo de caracteres permitidos*/
	if($tipo===0){	
		/*Alfabética 0*/
		$allow_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	}
	elseif($tipo===1){
		/*Numérica 1*/
		$allow_chars = "1234567890";
	}
	elseif($tipo===2){
		/*Alfanumérica 2*/
		$allow_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	}
	elseif($tipo===3){
		/*Caracteres especiales (La más segura) 3*/
		$allow_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!¡|¬°#$%&/()=?¿{}~^[]*.,:;-_@";
	}
		
		for($i=0;$i<$password_length;$i++) {
			$password .= substr($allow_chars,rand(0,62),1);
		}
		return $password;
	}
}
?>