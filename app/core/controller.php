<?php

class controller 
{
	public function libs($lib) 
	{
		$path =  "app/libs/". $lib .".php";

		if(file_exists($path))
		{
			require_once($path);
			$path = str_replace('-', '_', $lib);
			return new $path();
		}
	}
	public function model($model, $args = []) 
	{
		require_once( "app/models/". $model . ".php" );
		$new_name = str_replace('-', '_', $model);
		$new_model = $new_name . "_Model";
		return new $new_model( $args );
	}
	public function view( $view, $data = null ) {
		require_once 'app/views/'. $view . '.php';
	}
	public function checkIfAdminLogin()
	{
		$checking = $this->libs('checking');
		$checking->admin_check_login();
		$checking->ssl_check();
	}
	public function checkIfCustomerLogin()
	{
		$checking = $this->libs('checking');
		$checking->customer_check_login();
		$checking->ssl_check();
	}
}