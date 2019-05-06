<?php

namespace App\Connection;
use App\EasyInterface\EasyInterface;
use PDO;


class Connection implements EasyInterface
{
	public $pdo;
    public function setup($host,$dbname,$name,$password)
    {
    $this->pdo = new PDO("mysql:host={$host};dbname={$dbname}",$name, $password);
    }
    public function selectAll($table)
    {
    	$sql = "SELECT * FROM $table";
    	try {
    		$db = new Connection;
    		$db = $this->pdo->query($sql);
    		$stmt = $db->fetchAll(PDO::FETCH_ASSOC);
    		return $stmt;
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }

    public function selectById($table, $id)
    {
    	$this->id = $id;
    	$sql = "SELECT * FROM $table WHERE id = $this->id";
    	try {
    		$db = new Connection;
    		$db = $this->pdo->query($sql);
    		$stmt = $db->fetchAll(PDO::FETCH_ASSOC);
    		return $stmt;
    		
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }
    public function create($table, $data)
    {
    	$keys = implode(',', array_keys($data));
    	$tags = ":" . implode(', :', array_keys($data));
    	$sql = "INSERT INTO {$table}($keys)VALUES({$tags})";
    	try {
    		$db = new Connection;
    		$db = $this->pdo->prepare($sql)->execute($data);
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }
    public function delete($table, $id)
    {

    	$sql = "DELETE FROM $table WHERE id = $id";
    	try {
    		$db = new Connection;
    		$db = $this->pdo->prepare($sql)->execute();
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }
    public function update($table, $data)
    {
    	foreach ($data as $key=>$value) 
    	{
    		$fields .= $key . "=:" . $key . ",";	
    	}
    	$fields = rtrim($fields, ",");
    	$sql = "UPDATE $table SET $fields WHERE id =:id";
    	try {
    		$db = new Connection;
    		$db = $this->pdo->prepare($sql)->execute($data);
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }
    public function addColumn($table, $name, $type)
    {
    	$sql = "ALTER TABLE $table ADD $name $type";
    	try {
    		$db = new Connection;
    		$db = $this->pdo->prepare($sql)->execute();
    		
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }

    public function destroy($table)
    {
    	$sql = "DELETE FROM $table";
    	try {
    		$db = new Connection;
    		$db = $this->pdo->prepare($sql)->execute();
    		
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }
}
