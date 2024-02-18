<?php
/*Regresa un array con rangos de tiempo especifico como: mes, la semana pasada etc.*/
use CodeIgniter\I18n\Time;
function get_current_time(){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	$time = Time::now($config_info['timezone']);
	return $time->toDateTimeString();
}
/**/
function get_simple_date_ranges(){
	$today =  date('Y-m-d');
	$yesterday = date('Y-m-d', mktime(0,0,0,date("m"),date("d")-1,date("Y")));
	$six_days_ago = date('Y-m-d', mktime(0,0,0,date("m"),date("d")-6,date("Y")));
	$start_of_this_month = date('Y-m-d', mktime(0,0,0,date("m"),1,date("Y")));
	$end_of_this_month = date('Y-m-d',strtotime('-1 second',strtotime('+1 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00'))));
	$start_of_last_month = date('Y-m-d', mktime(0,0,0,date("m")-1,1,date("Y")));
	$end_of_last_month = date('Y-m-d',strtotime('-1 second',strtotime('+1 month',strtotime((date('m') - 1).'/01/'.date('Y').' 00:00:00'))));
	$start_of_this_year =  date('Y-m-d', mktime(0,0,0,1,1,date("Y")));
	$end_of_this_year =  date('Y-m-d', mktime(0,0,0,12,31,date("Y")));
	$start_of_last_year =  date('Y-m-d', mktime(0,0,0,1,1,date("Y")-1));
	$end_of_last_year =  date('Y-m-d', mktime(0,0,0,12,31,date("Y")-1));
	$start_of_time =  date('Y-m-d', 0);
	return array(
		0=>Lang('Reports.select_period'),
		$today. '/' . $today 								=> Lang('Reports.hoy'),
		$yesterday. '/' . $yesterday						=> Lang('Reports.ayer'),
		$six_days_ago. '/' . $today 						=> Lang('Reports.semana'),
		$start_of_this_month . '/' . $end_of_this_month		=> Lang('Reports.mes'),
		$start_of_last_month . '/' . $end_of_last_month		=> Lang('Reports.mes_anterior'),
		$start_of_this_year . '/' . $end_of_this_year	 	=> Lang('Reports.year'),
		$start_of_last_year . '/' . $end_of_last_year		=> Lang('Reports.last_year'),
		$start_of_time . '/' . 	$today						=> Lang('Reports.todo'));
}
/*Regresa un array con los meses sin abreviar más un indice para indicar todos*/
function get_full_months(){
	$meses=array(
		'0'  => Lang("Common.all"),
		'01'  => Lang("Common.ene"),
		'02'  => Lang("Common.feb"),
		'03'  => Lang("Common.mar"),
		'04'  => Lang("Common.abr"),
		'05'  => Lang("Common.may"),
		'06'  => Lang("Common.jun"),
		'07'  => Lang("Common.jul"),
		'08'  => Lang("Common.ago"),
		'09'  => Lang("Common.sep"),
		'10'  => Lang("Common.oct"),
		'11'  => Lang("Common.nov"),
		'12'  => Lang("Common.dic"));
		return $meses;
}
/*Regresa un array con los meses abreviados*/
function get_months($format='m'){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	$months = array();
	for($k=1;$k<=12;$k++){
		$cur_month = mktime(0, 0, 0, $k, 1, 2000);
		$mes=date("M",$cur_month);
		if($config_info["language"]=="ES"){
			switch ($mes) {
			case "Jan":
			$mes="Ene";
			break;
			case "Apr":
			$mes="Abr";
			break;
			case "Aug":
			$mes="Ago";
			break;
			case "Dec":
			$mes="Dic";
			break;
			default:
			}
		}
			$months[date($format, $cur_month)] = $mes;
	}
	return $months;
}
/*Regresa un array con los dias del mes*/
function get_days(){
	$days = array();
	for($k=1;$k<=date('t');$k++){
		$cur_day = mktime(0, 0, 0, 1, $k, 2000);
		$days[date('d',$cur_day)] = date('j',$cur_day);
	}
	return $days;
}
/*Regresa un array con los anteriores diez años*/
function get_years(){
	$years = array();
	for($k=0;$k<10;$k++){
		$years[date("Y")-(9-$k)] = date("Y")-(9-$k);
	}
	return $years;
}
/*Regresa un array con los siguientes diez años*/
function get_next_years(){
	$years = array();
$years[date("Y")-1] = date("Y")-1;
	for($k=0;$k<10;$k++){
		$years[date("Y")+$k] = date("Y")+$k;
	}
	return $years;
}
/*Regresa un array con las horas del día*/
function get_hours(){
	$hours = array();
	for($k=1;$k<=24;$k++){
		$cur_hour = mktime($k, 0, 0, 0, 0, 0);
		$hours[date("G", $cur_hour)] = date("G",$cur_hour).'Hrs';
	}
	return $hours;
}
/*Regresa un array con los minutos de una hora*/
function get_minutes(){
	$minutes = array();
	for($k=1;$k<=60;$k++){
		$cur_minute = mktime(0, $k, 0, 0, 0, 0);
		$minutes[date("i", $cur_minute)] = date("i",$cur_minute);
	}
	return $minutes;
}
/*Regresa un array de colores hexadecimales aleatorios de longitud solicitada*/
/*function get_randoReports.colors($how_many){
	$colors = array();
	for($k=0;$k<$how_many;$k++){
		$colors[] = '#'.randoReports.color();
	}
	return $colors;
}
/*Regresa un color hexadecimal aleatorio*
function randoReports.color(){
    mt_srand((double)microtime()*1000000);
    $c = '';
    while(strlen($c)<6){
        $c .= sprintf("%02X", mt_rand(0, 255));
    }
    return $c;
}*/
/*Regresa el minuto de la hora actual del dia*/
function selected_minute(){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	date_default_timezone_set($config_info["timezone"]);
	$myTime = new Time('now');
	$minuto = substr($myTime, -5,-3);
	return $minuto;
}
/*Regresa la hora actual del dia*/
function selected_hour(){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	date_default_timezone_set($config_info["timezone"]);
	$myTime = new Time('now');
	$hora = substr($myTime, -8,-6);
	return $hora;
}
/*Regresa el dia actual*/
function selected_day($xtra_days=0){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	date_default_timezone_set($config_info["timezone"]);
	$myTime = new Time('now');
	if($xtra_days>0)$myTime = new Time('+'.$xtra_days.' day');
	$dia = substr($myTime, -11,-9);
	return $dia;
}
/*Regresa el mes actual*/
function selected_month(){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	date_default_timezone_set($config_info["timezone"]);
	$myTime = new Time('now');
	$mes = substr($myTime, -14,-12);
	return $mes;
}
/*Regresa el año actual*/
function selected_year(){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	date_default_timezone_set($config_info["timezone"]);
	$myTime = new Time('now');
	$year = substr($myTime, -19,-15);
	return $year;
}
/*Regresa un array con los dias de la semana en curso el indice nos dice el dia 0 (para domingo) hasta 6 (para sábado) el indice 7 el Número de la semana del año*/
function get_current_week_days(){
	$Appconfig = model('App\Models\Appconfig');
	$config_info=$Appconfig->get_info();
	date_default_timezone_set("UTC");
	$timestamp=time();
	$timezone  = $config_info['timezone'];
	$dia=Time::createFromTimestamp($timestamp, $timezone);
	$fecha_hora_actual=	$dia->toLocalizedString('YYYY-MM-DD');
	//$fecha_hora_actual=unix_to_human($dia,false,'mx');
	$year = substr($fecha_hora_actual, -16,4);
	$dia = substr($fecha_hora_actual, -8,2);
	$mes = substr($fecha_hora_actual, -11,2);
	# Obtenemos el numero de la semana
	$semana=date("W",mktime(0,0,0,$mes,$dia,$year));
	# Obtenemos el día de la semana de la fecha dada
	$diaSemana=date("w",mktime(0,0,0,$mes,$dia,$year));
	# el 0 equivale al domingo...
	if($diaSemana==0)
		$diaSemana=7;
	# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
	$primerDia=date("d",mktime(0,0,0,$mes,$dia-$diaSemana+1,$year));
	# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
	$ultimoDia=date("d",mktime(0,0,0,$mes,$dia+(7-$diaSemana),$year));
	$current_week=array();
	for($k=$primerDia;$k<=$ultimoDia;$k++){
		$current_week[date("d",mktime(0,0,0,$mes,$k,$year))] = date("w",mktime(0,0,0,$mes,$k,$year));
	}
	//$current_week[0]=date("w");
	$current_week[7]=date("W",mktime(0,0,0,$mes,$k,$year));
	return $current_week;
}
/**/
if ( ! function_exists('_stringify_attributes'))
{
	/**
	 * Stringify attributes for use in HTML tags.
	 *
	 * Helper function used to convert a string, array, or object
	 * of attributes to a string.
	 *
	 * @param	mixed	string, array, object
	 * @param	bool
	 * @return	string
	 */
	function _stringify_attributes($attributes, $js = FALSE)
	{
		$atts = NULL;
		if (empty($attributes))
		{
			return $atts;
		}
		if (is_string($attributes))
		{
			return ' '.$attributes;
		}
		$attributes = (array) $attributes;
		foreach ($attributes as $key => $val)
		{
			$atts .= ($js) ? $key.'='.$val.',' : ' '.$key.'="'.$val.'"';
		}
		return rtrim($atts, ',');
	}
}
/**/
if ( ! function_exists('timezones'))
{
	/**
	 * Timezones
	 *
	 * Returns an array of timezones. This is a helper function
	 * for various other ones in this library
	 *
	 * @param	string	timezone
	 * @return	string
	 */
	function timezones($tz = '')
	{
		// Note: Don't change the order of these even though
		// some items appear to be in the wrong order
		$zones = array(
			'UM12'		=> -12,
			'UM11'		=> -11,
			'UM10'		=> -10,
			'UM95'		=> -9.5,
			'UM9'		=> -9,
			'UM8'		=> -8,
			'UM7'		=> -7,
			'UM6'		=> -6,
			'UM5'		=> -5,
			'UM45'		=> -4.5,
			'UM4'		=> -4,
			'UM35'		=> -3.5,
			'UM3'		=> -3,
			'UM2'		=> -2,
			'UM1'		=> -1,
			'UTC'		=> 0,
			'UP1'		=> +1,
			'UP2'		=> +2,
			'UP3'		=> +3,
			'UP35'		=> +3.5,
			'UP4'		=> +4,
			'UP45'		=> +4.5,
			'UP5'		=> +5,
			'UP55'		=> +5.5,
			'UP575'		=> +5.75,
			'UP6'		=> +6,
			'UP65'		=> +6.5,
			'UP7'		=> +7,
			'UP8'		=> +8,
			'UP875'		=> +8.75,
			'UP9'		=> +9,
			'UP95'		=> +9.5,
			'UP10'		=> +10,
			'UP105'		=> +10.5,
			'UP11'		=> +11,
			'UP115'		=> +11.5,
			'UP12'		=> +12,
			'UP1275'	=> +12.75,
			'UP13'		=> +13,
			'UP14'		=> +14
		);
		if ($tz === '')
		{
			return $zones;
		}
		return isset($zones[$tz]) ? $zones[$tz] : 0;
	}
}
/**/
if ( ! function_exists('timezone_menu'))
{
	/**
	 * Timezone Menu
	 *
	 * Generates a drop-down menu of timezones.
	 *
	 * @param	string	timezone
	 * @param	string	classname
	 * @param	string	menu name
	 * @param	mixed	attributes
	 * @return	string
	 */
	function timezone_menu($default = 'UTC', $class = '', $name = 'timezones', $attributes = ''){
		$default = ($default === 'GMT') ? 'UTC' : $default;
		$menu = '<select name="'.$name.'"';
		if ($class !== '')
		{
			$menu .= ' class="'.$class.'"';
		}
		$menu .= _stringify_attributes($attributes).">\n";
		foreach (timezones() as $key => $val)
		{
			$selected = ($default === $key) ? ' selected="selected"' : '';
			$menu .= '<option value="'.$key.'"'.$selected.'>'.Lang("Date".$key)."</option>\n";
		}
		return $menu.'</select>';
	}
}
?>
