<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Connection\Connection;

$connection = new Connection;
$connection->setup('localhost','easy','root','');
$all = $connection->selectAll('students');
$id = $connection->selectById('students','2');
$column = $connection->addColumn('students', 'phone','int');
$create = $connection->create('students', [
	'id'=>'1',
	'name'=>'Den',
	'surname'=>'Bakalo',
	'phone'=>'222',

]);
$update = $connection->update('students', [
	'id'=>'1',
	'name'=>'Artur',
	'surname'=>'Krets',
	'phone'=>'553535',

]);
die();
$delete = $connection->delete('students','1');






