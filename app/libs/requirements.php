<?php

class Requirements
{
	public static function checkAPI($array_params)
	{
		if(array_key_exists('api_key', $array_params) && $array_params['api_key'] != '')
		{
			$api_key_arr = ['MOBA97!HX1@202!','WEBA97!HX1@202!'];
			$api_key = $array_params['api_key'];

			if(!in_array($api_key, $api_key_arr)){
				Response::output(19.1);
			}
		}
		else{
			Response::output(19.2);
		}
	}
	public static function checkArgs($array_params, $data = null)
	{
		$type = $array_params['request_type'];

		switch ($type)
      	{
			case 'searchDescriptor':
				$required_arr = ['descriptor'];
			break;

			case 'validateDescriptor':
				$required_arr = ['descriptor'];
			break;

			case 'search':
				$required_arr = ['mid'];
			break;

			case 'inDirectRefund':
				$required_arr = ['mid'];		
			break;

			case 'directRefund':
				$required_arr = [
					'req_descriptor',
					'refund_reason',
					'purchase_date',
					'amount',
					'email_address',
					'email_address_confirm'];
			break;

			case 'cancelSubscription':
				$required_arr = $data;
			break;

			case 'signIn':
				$required_arr = ['username','password'];
			break;

			case 'checkUsername':
				$required_arr = ['username'];
			break;

			case 'signUp':
				$required_arr = [
					'first_name',
					'last_name',
					'username',
					'password',
					'main_email_address',
					'notification_promo',
					'notification_newmerch'];
			break;

			case 'modifyPassword':
				$required_arr = ['token','old_password','new_password'];
			break;

			case 'modifyOtherEmails':
				$required_arr = ['token','other_email_address'];
			break;

			case 'getProfile':
				$required_arr = ['token'];
			break;

			case 'loginWithGoogle':
				$required_arr = ['email', 'google_id'];
			break;

			case 'checkCaptcha':
				$required_arr = ['captcha'];
			break;

			case 'contactUs':
				$required_arr = ['first_name','last_name','email','message'];
			break;
			
      	}

		$is_missing_exist = self::checkMissingParams(
      		[
			   'required_arr'=>$required_arr,
			   'collection_arr'=>$array_params,
			],true);

		$is_empty_exist = self::checkNullParams(
			['collection_arr'=>$array_params],true);	

		
		if($is_missing_exist==true || $is_empty_exist==true){
			return Response::output(20.1);
		}	
	}
	public static function checkMissingParams($array_params)
	{
		$required_arr = $array_params['required_arr'];
		$collection_arr = $array_params['collection_arr'];

		foreach($required_arr as $key=>$val)
		{
			if(!array_key_exists($val,$collection_arr)){
				Response::output(20.2,$val);
			}
		}
	}
	public static function checkNullParams($array_params)
	{
		$collection_arr = $array_params['collection_arr'];
		
		foreach($collection_arr as $key=>$val)
		{
			if($val=='' || is_null($val)){
				Response::output(20.3,$key);
			}
		}
	}
}

https://ican4consumers.com/demo2/