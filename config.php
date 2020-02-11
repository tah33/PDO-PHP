<?php

class oopcrud
{
	private $conn;
	public function __construct()
	{
		$this->conn = new PDO("mysql:host=localhost;dbname=cookbook",'root','');
	}

	public function getColumns($table)
	{
		$sql = $this->conn->query("SELECT * FROM $table LIMIT 1");
		$query = $sql->fetch();
		return $query;
	}

	public function show($table)
	{
		$sql = $this->conn->query("SELECT * FROM $table");
		$query = $sql->fetchAll();
		return $query;
	}

	public function insert($columns,$values,$table)
	{
		foreach ($columns as $key => $column)
			$placeholders[] = '?';
		
		$sql = $this->conn->prepare("INSERT INTO $table (".implode(',', $columns).") VALUES (".implode(',', $placeholders).") ");
		$query = $sql->execute($values);
		
		return true;
	}

	public function profile($id,$table)
	{
		$sql = $this->conn->prepare("SELECT * FROM $table WHERE id = ? ");
		$query = $sql->execute(array($id));
		$data = $sql->fetch();
		return $data;
	}

	public function update($id,$columns , $values,$table)
	{
		foreach ($columns as $key => $column) 
			$updates[] = "$column = ?";
		
		$sql = $this->conn->prepare("UPDATE $table SET ".implode(',', $updates)." WHERE id = ? ");
		$values[] = $id;
		
		$query = $sql->execute($values);
		return true;
	}

	public function delete($id,$table)
	{
		$sql = $this->conn->prepare("DELETE FROM $table WHERE id = ? ");
		$query = $sql->execute(array($id));
		return true;
	}

}
?>