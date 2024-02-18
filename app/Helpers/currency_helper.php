<?php
function to_currency($number,$coin,$decimals=2){
	$currency_symbol = '$';
	if($number<0){
		$currency_symbol = '-$';
	}
	$number=abs($number);
	$number=sprintf ("%.".$decimals."f",$number);
	$split_n=explode('.', $number);
	$decimales=strlen(rtrim($split_n[1], '0'));

	 $number = $number=$split_n[0].".".rtrim($split_n[1], '0');
	 $number=number_format($number,$decimales, '.', ',');
	if($split_n[1]==0)$number=number_format($split_n[0], 2, '.', ',');
	
	
	return $currency_symbol.$number.$coin;
}
function to_currency_no_money($number){
	$number=sprintf ("%.10f",$number);
	$split_n=explode('.', $number);
	$decimales=strlen(rtrim($split_n[1], '0'));
	 $number = $number=$split_n[0].".".rtrim($split_n[1], '0');
	 $number=number_format($number,$decimales, '.', ',');
	 if($split_n[1]==0)$number=number_format($split_n[0], 2, '.', ',');
	return $number;
}
function to_currency_no_money_no_coma($number){
	$number=sprintf ("%.10f",$number);
	$split_n=explode('.', $number);
	$decimales=strlen(rtrim($split_n[1], '0'));
	 $number = $number=$split_n[0].".".rtrim($split_n[1], '0');
	 $number=number_format($number,$decimales, '.', ',');
	 if($split_n[1]==0)$number=number_format($split_n[0], 2, '.', ',');
	 $number=str_replace(",", "", $number);
	return $number;
}
?>
