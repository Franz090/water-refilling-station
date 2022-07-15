<?php 
ob_start();
error_reporting(E_ALL);

class User_Logs_Model extends Model
{
	public function save($params)
	{
		$values = [
			'action' => stripslashes(trim(htmlspecialchars($params['action']))),
			'accountID' => $params['accountID'],
			'ipAddress' => $params['ipAddress'],
			'browser' => $params['browser']
		];

		$this->db->insert('userLogs', $values);
	}
}

ob_end_flush();