<?php

class Checking
{
	public function admin_check_login()
	{
		if(!isset($_SESSION['account_info']))
		{
			header('location: '.URL.'account/sign-in');
			exit();
		}
	}
	public function customer_check_login()
	{
		if(!isset($_SESSION['account_info']))
		{
			header('location: '.URL.'customer/sign-in');
			exit();
		}
	}
	public function ssl_check()
	{
		$server = $_SERVER['HTTP_HOST'];
		$url = $_SERVER['REQUEST_URI'];
		$port = $_SERVER['SERVER_PORT'];

		if(strtolower($server)!='localhost')
		{
			if($port!=443){header("location: https://".$server.$url);}
		}
	}
}