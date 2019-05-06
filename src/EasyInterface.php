<?php
namespace App\EasyInterface;

interface EasyInterface
{
	public function setup($host,$dbname,$name,$password);
	public function selectAll($table);
	public function selectById($table, $id);
	public function create($table, $data);
	public function delete($table, $id);
	public function update($table,$data);
	public function addColumn($table,$name, $type);
	public function destroy($table);
}

