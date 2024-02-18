<?php
if ( ! function_exists('get_printers_location')){
	/*Aqui comienza el helper para los sales*/
	function get_printers_location($locations,$printers,$select_printers){
		$table='';
		foreach($locations as $location){
			if($location!==''){
			$table.='<div class="input-group mb-3">';
			$table.='<div class="input-group-prepend">';
			$table.='<label class="input-group-text" for="inputGroupSelect01">'.$location.'</<label>';
			$table.='</div>';
			if(isset($select_printers[$location]))$table.=form_dropdown('ticket_print_'.url_title($location,'_'),$printers,$select_printers[$location],array('class'=>'custom-select','id'=>'ticket_print_'.url_title($location,'_')));
			$table.='</div>'; 
			}
		} 
		return $table;  
	} 
}
if ( ! function_exists('get_location')){
	/*Aqui comienza el helper para los sales*/
	function get_location($locations,$location){
		$table='';
			$table.='<div class="input-group mb-3">';
			$table.='<div class="input-group-prepend">';
			$table.='<label class="input-group-text" for="inputGroupSelect01">'.Lang('Common.location').'</<label>';
			$table.='</div>';
			$table.=form_dropdown('ubicacion',$locations,$location,array('class'=>'custom-select','id'=>'ubicacion'));
			$table.='</div>'; 
		return $table;  
	} 
}

if ( ! function_exists('get_ubicaciones')){
	/*Aqui comienza el helper para los sales*/
	function get_ubicaciones($config_info,$printers_a,$familias){
		extract($config_info);
		$locations=json_decode($locations,true);
		$impresoras=json_decode($config_info['printers'],true);
		
		$c=0;
		$table='';
		$familias['tickets']=Lang('Config.print_ticket');
		foreach($locations as $i=>$location){
			$c++;
			if($location!==''){
			
			$table.= form_label(Lang('Common.location').':'.$location,$i,array('class'=>'small_label','id'=>'label_location_'.$c));
			$table.= '<input type="hidden" id="location_'.$c.'" value="'.$i.'">';
			$table.= '<button class="cover_interaction_help_button" id="del_location_'.$c.'" value="location_'.$c.'">Borrar</button>';
				foreach($familias as $family){
					$selected_printer='';
					if(isset($impresoras[url_title($location,'_')]))$selected_printer=$impresoras[url_title($location,'_')][url_title($family,'_')];
					$table.='<div class="input-group mb-3">';
					$table.='<div class="input-group-prepend">';
					$table.='<label class="input-group-text" for="ticket_print-'.url_title($location,'_').'-'.url_title($family,'_').'">'.$family.'</<label>';
					$table.='</div>';
					$table.=form_dropdown('ticket_print_'.url_title($location,'_').'-'.url_title($family,'_'),$printers_a,$selected_printer,array('class'=>'custom-select','id'=>'ticket_print-'.url_title($location,'_').'-'.url_title($family,'_')));
					$table.='</div>'; 
				}
				}
		}

		
			
		return $table;  
	} 
}
?>
 