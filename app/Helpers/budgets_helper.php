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
    
    function get_budgets_manage_table_data_rows($budgets,$controller_name){

    }
}
?>