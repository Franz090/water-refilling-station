<?php

class Validation extends Controller{
	function __construct(){
		$this->sanitize = $this->libs('sanitization');
	}
	function email($email)
	{
		$clean_email = $this->sanitize->email($email);
		$response = (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 
					$clean_email : Response::output(3,$clean_email);
		return $response;
	}
	function url($url)
	{
		$sanitizedUrl = $this->sanitize->url($url);
		$code = (filter_var($sanitizedUrl, FILTER_VALIDATE_URL)) ? 5.1 : 5.2;
		return Response::output($code,$sanitizedUrl);

		// $website = $this->input($url);
		// if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
		//   $websiteErr = "Invalid URL";
		// }
	}
	function urlContainsQuery($url)
	{
		$sanitizedUrl = $this->sanitize->url($url);
		$code = (filter_var($sanitizedUrl, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)) ? 6.1 : 6.2;
		return Response::output($code,$sanitizedUrl);
	}
	function integersWithinARange($int)
	{
		$sanitizedInt = $this->sanitize->number_int($int);
		$code = (filter_var($sanitizedInt, FILTER_VALIDATE_INT, 
				array("options" => array("min_range" => 0,"max_range" => 100))));
		return Response::output($code,$sanitizedInt);
	}
	function timeFormat($data)
	{
		switch ($data['format']) {
			case '12-hour':
				preg_match("/^(?:1[012]|0[0-9]):[0-5][0-9]$/", $data['time']);
				break;
			case '24-hour':
				preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $data['time']);
				break;
			case '24-hour going from 01:00 to 24:59':
				preg_match("/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9])$/", $data['time']);
				break;
		}
	}
	function isAmountValid($amount)
	{
		if(is_numeric($amount)){
			$response = ($amount >= 1 && $amount <= 1000) ? $amount : Response::output(30.2);
		}
		else{
			$response = Response::output(30.2);
		}

		return $response;
	}
	function isCardValid($params)
	{
		$first6 = $params['first6'];
        $last4 = $params['last4'];
	    $first_digit = substr($first6,0,1);

		return (strlen($first6)==6 && strlen($last4)==4) ? 
		Response::output(31.1) : Response::output(31.2);
	}
	function isDateValid($date)
	{
        $date_array = explode('-',$date);
      
        if(count($date_array)==3)
        {
            $year = intval($date_array[0]);
            $month = intval($date_array[1]);
            $day = intval($date_array[2]);
            
            $yearlen = strlen($year);
            
            $response = ($month<=12 && $day<=31 && $yearlen==4) ? 
            Response::output(32.1) : Response::output(32.2);

        }else{$response = Response::output(32.2);}

        return $response;
	}
	function dateExpiration($array_params)
	{
		$curr_time = date('Y-m-d H:i:s');
		$time = $array_params['time'];
		$per_day = 86400;
		
		$limit_days = 91;
		$result_diff = (strtotime($curr_time) -  strtotime($time));
		$days_diff = $result_diff / $per_day;
		
		$status='SETTLED';

		if($status=='TESTING'){return false;}

		if(floatval($days_diff)>floatval($limit_days)){
			Response::output(34.1);
		}
		elseif(strtotime($time)> strtotime($curr_time)){
			Response::output(34.2);
		}
		
		return false;
	}
	function input($value)
	{
		$value = trim($value);
		$value = stripslashes($value);
		$value = htmlspecialchars($value);
		return $value;
	}
	function onlyLetters($value)
	{
		// check if name only contains letters and whitespace
	    if (!preg_match("/^[a-zA-Z-' ]*$/",$value)) {
			Response::output(8);
	    }
	}
}