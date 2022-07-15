<?php 

class Model
{
	public function __construct()
	{
		$this->db = new PDOConnection(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}
}
