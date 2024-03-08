<?php 
if ( ! function_exists('get_table_report')){
    function get_table_report($data){
        $html='<div class="row" id="report_grid">';
       
            
        foreach($data['headers'] as $header){
            $html.='<div class="col-sm">'.$header.'</div>';

        }
        $html.='</div>';

        $html.=get_table_rows($data['rows']);
        return $html;

    }
}
if ( ! function_exists('get_table_rows')){
    function get_table_rows($rows){
        $html=' <div class="row grid_result">';
        foreach($rows as $sucursal=>$monto){
            $html.=' <div class="col-sm">'.$sucursal;
            $html.='</div>';
            $html.=' <div class="col-sm">'.$monto;
            $html.='</div>';
        }
        $html.='</div>';
        return $html;
    }
}
if ( ! function_exists('get_table_row')){
    function get_table_row($i,$row){
      
       

        
        return $html;
    }}