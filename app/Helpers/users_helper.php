<?php
if ( ! function_exists('get_users_manage_table')){
	/*Genera la tabla del modulo de users*/
	function get_users_manage_table($people,$controller_name){

		$table='<div class="cover_titles_table">';
		$headers = array(
		Lang('Common.id'),
		Lang('Common.first_name'),
		Lang("Users.user"),
		);
		$table.='<div class="titles_table_c" id="checkbox_select_all"><input type="checkbox" id="select_all" /></div>';
		$table.='<div class="titles_table_c">'.Lang('Common.online').'</div>';
		foreach($headers as $key=>$header){
			$table.='<div class="titles_table_c sort_column_'.$key.'" id="title_'.$key.'">'.$header.'</div>';
		}
		$table.='<div class="titles_table_c">'.Lang("Common.edition").'</div>';
		$table.='</div>';
		$table.='<input type="hidden" id="order_flag" value=""/>';
		$table.='<input type="hidden" id="class_manage" value="titles_table_c"/>';
		$table.='<section class="cover_result_table" id="cover_resultados_tabla">';
		$table.=get_users_manage_table_data_rows($people,$controller_name);
		$table.='</section>';
		return $table;
	}
}
if ( ! function_exists('get_users_manage_table_data_rows')){
	/* Genera las filas de la tabla de usuarios*/
function get_users_manage_table_data_rows($people,$controller_name,$search=false){


    $table_data_rows='';
    $table_data_rows_array=array();

    foreach($people->getResult() as $key=> $person)
    {

        //if($person->person_id!=$logged_person_id){
            $table_data_rows.='<input type="hidden" id="'.$key.'" value="'.$person->person_id.'" />';
            $table_data_rows.=get_user_data_row($person,$controller_name,$logged_person_id);
            $table_data_rows_array[$person->person_id]=get_user_data_row($person, $controller_name).'<input type="hidden" id="'.$key.'" value="'.$person->person_id.'" />';
        //}
    }
    if($people->getNumRows()==0)
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

if ( ! function_exists('get_user_data_row')){
	/*Genera una fila de la tabla de usuarios*/
	function get_user_data_row($person,$controller_name){
		$User = model('App\Models\User');
		$is_online=$User->is_online($person->person_id);

		//var_dump($is_online);
		$table_data_row='<div class="files_result_table" name="row_'.$person->person_id.'" id="row_'.$person->person_id.'">';
		$table_data_row.="<div class='box_result_table_c' id='seleccionar_".$person->person_id."'><div id='seleccionar_t_".$person->person_id."' class='soloVisibleResponsivamente'><span>".Lang('Common.seleccionar')."</span></div><span class='information'><input type='checkbox' class ='chksbxs' name ='chksbxs[]' id='chksbxs[$person->person_id]' value='".$person->person_id."' title='".Lang('Common.seleccionar')."'/></span></div>";
		if($person->person_id===1){
			$table_data_row.='<div id="col1'.$person->person_id.'" class="box_result_table_c"><div id="col1_t'.$person->person_id.'" class="soloVisibleResponsivamente"><span>'.Lang('Common.online').'</span></div><span class="icon_on_green"></span></div>';
		}
		else{
		$table_data_row.='<div id="col1'.$person->person_id.'" class="box_result_table_c"><div id="col1_t'.$person->person_id.'" class="soloVisibleResponsivamente"><span>'.Lang('Common.online').'</span></div><span class="information"><span class="icon_off_red"></span></span></div>';
		} 
		$table_data_row.='<div id="col2'.$person->person_id.'" class="box_result_table_c"><div id="col2_t'.$person->person_id.'" class="soloVisibleResponsivamente"><span>'.Lang('Common.id').'</span></div><span class="information">'.$person->person_id.'</div>';
		$table_data_row.='<div class="box_result_table_c" id="col3'.$person->person_id.'"><div id="col3_t'.$person->person_id.'" class="soloVisibleResponsivamente"><span>'.Lang("Common.first_name").' #'.$person->person_id.'</span><span class="icon_more"></span></div><span class="information">['.anchor(url_title(Lang($controller_name.".nav"))."/Info/".$person->person_id,character_limiter($person->first_name,13).' '.character_limiter($person->last_name,13),array('class'=>'info_form_ajax','title'=>Lang('Common.first_name'))).']</span></div>';
		$table_data_row.='<div class="box_result_table_c" id="col4'.$person->person_id.'"><div id="col4_t'.$person->person_id.'" class="soloVisibleResponsivamente"><span>'.Lang("Users.user").'</span></div><span class="information">['.$person->username.']</span></div>';
		$table_data_row.='<div  id="col5'.$person->person_id.'" class="box_result_table_c"><div id="col5_t'.$person->person_id.'"  class="soloVisibleResponsivamente" ><span>'.Lang("Common.edition").'</span></div><span class="information">'.anchor(url_title(Lang($controller_name.".nav"))."/Form/".$person->person_id, " ",array('class'=>'ajax-popup-link icon_edit_row','title'=>" ")).'</span></div>';
		$table_data_row.='</div>';
		return $table_data_row;
	}

}
?>