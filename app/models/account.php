<?php 
ob_start();
error_reporting(E_ALL);

class Account_Model extends Model
{
	public function create($params,$validate)
	{
		$username = $params['username'];
		$checkUsername = $this->checkUsername($username);

		$fullname = (array_key_exists('fullname', $params)) ? $params['fullname'] : '';

		$values = [
			'fullname' => $fullname,
			'username' => $validate->input($username),
			'password' => md5($validate->input($params['password'])),
			'accountType' => $validate->input($params['account_type']),
			'dateAdded' => CURDATE
		];

		$id = $this->db->insert('accounts', $values);

		return $id;
	}
	public function signInUser($params,$validate)
	{
		$values = [
			'username'	=> $validate->input($params['username']),
			'password' => md5($validate->input($params['password']))
		];

		$querystr = "SELECT * FROM accounts WHERE 
					BINARY username=BINARY :username AND 
					BINARY password=BINARY :password";

		$querydata = $this->db->select($querystr,$values);

		return $querydata;
	}
	public function updateAccountInfo($params,$validate)
	{
		$fullname = (array_key_exists('fullname', $params)) ? $params['fullname'] : '';

		$values = [
			'fullname' => $fullname,
			'username'	=> $validate->input($params['username']),
			'password'	=> md5($validate->input($params['newPassword']))
		];

		$this->db->update('accounts', $values, "`accountID` = '{$params['accountID']}'");
	}
	public function fetch()
	{
		$values = ['accountID'	=> $_SESSION['account_info']['accountID']];
		$querystr = "SELECT username FROM accounts WHERE accountID=:accountID";
		$querydata = $this->db->select($querystr,$values);
		return $querydata;
	}
	private function checkUsername($username)
	{
		$values = ['username' => $username];
		$querystr = "SELECT * FROM accounts WHERE BINARY username= BINARY :username";
		$querydata = $this->db->select($querystr,$values);

		if(count($querydata) > 0){Response::output(1.1);}
	}
}

ob_end_flush();