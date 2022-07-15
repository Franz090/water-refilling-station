<?php

class PDOConnection extends PDO
{
	function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
	}
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}

		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}

	public function insert($table, $data)
	{
		ksort($data);//sorting data.

		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$sth  = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();
		return $this->lastInsertId();
	}
	public function insert2($table, $columns, $fieldValues)
	{
		$fieldNames = implode('`, `', array_values($columns));
		$sth  = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES $fieldValues");

		$sth->execute();
		return $this->lastInsertId();
	}
	public function insert3($table, $fieldNames, $fieldValues)
	{
		$sth  = $this->prepare("INSERT INTO $table ($fieldNames) $fieldValues");

		$sth->execute();
		return $this->lastInsertId();
	}
	public function update($table, $data, $where)
	{
		ksort($data);//sorting data.

		$fieldDetails = NULL;
		foreach ($data as $key => $value) {
			$fieldDetails .= "`$key`=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');

		$sth  = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		$sth->execute();	
	}
	public function delete($table, $where, $limit = 1)
	{
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
}
