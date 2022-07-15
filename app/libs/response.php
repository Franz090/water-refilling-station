<?php

class Response
{
	public static function output($responsecode, $data = null)
	{
		$array_response = [];
		switch ($responsecode) {
			case 1.1:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> 'Error: Username already exists.'];
				break;
			case 1.2:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> 'Error: Email Address already exists.'];
				break;
			case 2.1:
				$array_response = [
					'responsecode'	=> 200,
					'status'		=> 'Success',
					'responsemsg'	=> 'Account has been registered successfully.'];
				break;
			case 2.2:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> 'Account creation failed.'];
				break;
			case 3:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> "'{$data}' is not a valid email address."];
				break;
			case 3.1:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> "Your current password doesn't exists."];
				break;
			case 3.2:
				$array_response = [
					'responsecode'	=> 200,
					'status'		=> 'Success',
					'responsemsg'	=> 'Account has been updated successfully, please sign in again.'];
				break;
			case 4.1:
				$array_response = [
					'responsecode'	=> 200,
					'status'		=> 'Success',
					'responsemsg'	=> 'Account verified'];
				break;
			case 4.2:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> 'Invalid username or password.'];
				break;
			case 5:
				$array_response = [
					'responsecode'	=> 200,
					'status'		=> 'Success',
					'responsemsg'	=> 'Thank you for your order!'];
				break;
			case 6:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> 'Only letters and white space allowed.'];
				break;

			case 7:
				$array_response = [
					'responsecode'	=> -1,
					'status'		=> 'Problem',
					'responsemsg'	=> 'File Upload failed.'];
				break;
		}

		self::jsonExit($array_response);
	}
	private static function jsonExit($response)
	{
		header('content-type: application/json');
      	ob_start("ob_gzhandler");
      	exit(json_encode($response));  
	}
}

