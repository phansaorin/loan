<?php
function to_currency($number, $decimals = 2)
{
	$CI =& get_instance();
	$currency_symbol = $CI->config->item('currency_symbol') ? $CI->config->item('currency_symbol') : '$';
	if($number >= 0)
	{
		$ret = $currency_symbol.number_format($number, $decimals, '.', ',');
    }
    else
    {
    	$ret = '&#8209;'.$currency_symbol.number_format(abs($number), $decimals, '.', ',');
    }

	return preg_replace('/(?<=\d{2})0+$/', '', $ret);
}