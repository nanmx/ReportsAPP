<?php 
if ( ! function_exists('get_table_budgets')){
    
    function get_table_budgets($budgets,$controller_name){
        $table='<div class="cover_titles_table">';
		$headers = array(
		'Tipo',
		'Presupuesto',
		'Mes',
		);
		$table.='<div class="titles_table_c" id="checkbox_select_all"><input type="checkbox" id="select_all" /></div>';
		$table.='<div class="titles_table_c">Sucursal</div>';
		foreach($headers as $key=>$header){
			$table.='<div class="titles_table_c sort_column_'.$key.'" id="title_'.$key.'">'.$header.'</div>';
		}
		$table.='<div class="titles_table_c">Editar</div>';
		$table.='</div>';
		$table.='<input type="hidden" id="order_flag" value=""/>';
		$table.='<input type="hidden" id="class_manage" value="titles_table_c"/>';
		$table.='<section class="cover_result_table" id="cover_resultados_tabla">';
		$table.=get_budgets_manage_table_data_rows($budgets,$controller_name);
		$table.='</section>';
		return $table;

    }
}
if ( ! function_exists('get_budgets_manage_table_data_rows')){
    
    function get_budgets_manage_table_data_rows($budgets,$controller_name,$search=false){
		$table_data_rows='';
		$table_data_rows_array=array();
		foreach($budgets->getResult() as $key=> $budget)
		{
	
				$table_data_rows.='<input type="hidden" id="'.$key.'" value="'.$budget->budget_id.'" />';
				$table_data_rows.=get_budget_data_row($budget,$controller_name,$budget->budget_id);
				$table_data_rows_array[$budget->budget_id]=get_budget_data_row($budget, $controller_name).'<input type="hidden" id="'.$key.'" value="'.$budget->budget_id.'" />';
		}
		if($budgets->getNumRows()==0)
		{
			$table_data_rows.="<div class='files_result_table'><div class='warning_message' id='empty' >".Lang('Users.null')."</div></div>";
			$table_data_rows_array[0]="<div class='files_result_table'><div class='warning_message' id='empty'>".Lang('Users.null')."</div></div>";
		}
		if($search==true)
		{
			return $table_data_rows_array;
		}
		else
		{
			return $table_data_rows;
		}
	}

}
if ( ! function_exists('get_budget_data_row')){
    
    function get_budget_data_row($budget,$controller_name,$search=false){

$table_data_rows='';
		
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		//var_dump($is_online);
		$table_data_row='<div class="files_result_table" name="row_'.$budget->budget_id.'" id="row_'.$budget->budget_id.'">';
		$table_data_row.="<div class='box_result_table_c' id='seleccionar_".$budget->budget_id."'><div id='seleccionar_t_".$budget->budget_id."' class='soloVisibleResponsivamente'><span>".Lang('Common.seleccionar')."</span></div><span class='information'><input type='checkbox' class ='chksbxs' name ='chksbxs[]' id='chksbxs[$budget->budget_id]' value='".$budget->budget_id."' title='".Lang('Common.seleccionar')."'/></span></div>";
		
		$table_data_row.='<div id="col1'.$budget->budget_id.'" class="box_result_table_c"><div id="col1_t'.$budget->budget_id.'" class="soloVisibleResponsivamente"><span>Sucursal</span></div><span class="information">'.$budget->sucursal.'</div>';

		$table_data_row.='<div id="col2'.$budget->budget_id.'" class="box_result_table_c"><div id="col2_t'.$budget->budget_id.'" class="soloVisibleResponsivamente"><span>Tipo</span></div><span class="information">'.$budget->type.'</div>';
		$table_data_row.='<div class="box_result_table_c" id="col3'.$budget->budget_id.'"><div id="col3_t'.$budget->budget_id.'" class="soloVisibleResponsivamente"><span>Presupuesto'.$budget->budget_id.'</span><span class="icon_more"></span></div><span class="information">['.anchor(url_title(Lang("Modules.".strtolower($controller_name)."_nav"))."/Info/".$budget->budget_id,to_currency($budget->budget,""),array('class'=>'info_form_ajax','title'=>Lang('Common.first_name'))).']</span></div>';
		$table_data_row.='<div class="box_result_table_c" id="col4'.$budget->budget_id.'"><div id="col4_t'.$budget->budget_id.'" class="soloVisibleResponsivamente"><span>Usuario</span></div><span class="information">['.$meses_ES[$budget->month].' '.$budget->year.']</span></div>';
		$table_data_row.='<div  id="col5'.$budget->budget_id.'" class="box_result_table_c"><div id="col5_t'.$budget->budget_id.'"  class="soloVisibleResponsivamente" ><span>Editar</span></div><span class="information">'.anchor(url_title(Lang("Modules.".strtolower($controller_name)."_nav"))."/Form/".$budget->budget_id, " ",array('class'=>'ajax-popup-link icon_edit_row','data-toggle'=>'modal','data-target'=>'#form','data-whatever'=>'Editar Presupuesto '.$budget->budget_id,'title'=>" ")).'</span></div>';
		$table_data_row.="<input type='hidden' id='".$budget->budget_id."' value='".json_encode($budget)."'>";
		$table_data_row.='</div>';
		return $table_data_row; 
	}
}

?>