<?php 
if ( ! function_exists('get_table_report')){
    function get_table_report($data,$type){
        $html='<div class="row" id="report_grid">';
       
            
        foreach($data['headers'] as $header){
            $html.='<div class="col-sm">'.$header.'</div>';

        }
        $html.='</div>';

        $html.=get_table_rows($data['rows'],$type);
        return $html;

    }
}
if ( ! function_exists('get_table_rows')){
    function get_table_rows($rows,$type){
        $html='';
        foreach($rows as $sucursal=>$monto){
           // if($type==='sales')$monto=to_currency($monto[],'MXN');
           $diferencia=$monto['current']-$monto['last'];
           $last=$monto['last'];
           $current=$monto['current'];
           if($type==='sales' || $type==='profit'){
                $last=to_currency($last,'MXN');
                $current=to_currency($current,'MXN');
                $diferencia=to_currency($diferencia,'MXN');
            }
      //    $diferencia=0;
            $html.=' <div class="row grid_result">';
            $html.=' <div class="col-sm">'.$sucursal;
            $html.='</div>';
            $html.=' <div class="col-sm">'.$last;
            $html.='</div>';
            $html.=' <div class="col-sm">y';
            $html.='</div>';
            $html.=' <div class="col-sm">'.$current;
            $html.='</div>';
            $html.=' <div class="col-sm">'.$diferencia;
            $html.='</div>';
           
            $html.='</div>';
        }
       
        return $html;
    }
}
if ( ! function_exists('get_table_row')){
    function get_table_row($i,$row){
      
       

        
        return $html;
    }}