<?php
/**/ 
if ( ! function_exists('nav')){
	function nav($modules,$Login_lib){
    $html="";
    foreach($modules->getResult() as $module){
       // $permissions=$Login_lib->get_module_permissions($module->module_id);
        //if($permissions['allowed']===true){
           
            $html.='<div class="box_modules_header">
            <a href="'.base_url().url_title(Lang("Modules.".$module->module_id."_nav")).'">
            <img src="'.base_url().'assets/pos/images/menubar/'.$module->module_id.'.svg" border="0" alt="Menubar Image"  name="'.$module->module_id.'" class="modulos2" style="background-color: grey;"/>
            </a>
            <a class="name_menu_modules_header" href="'.base_url().url_title(Lang("Modules.".$module->module_id."_nav")).'">'.Lang("Modules.".$module->module_id."_nav").'</a>
            </div>';
        }
        
  //  }
    return $html;
  }
}
?>