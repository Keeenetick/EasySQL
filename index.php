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
	'name'=>'Example',
	'surname'=>'Example',
	'phone'=>'222',

]);
$update = $connection->update('students', [
	'id'=>'1',
	'name'=>'Example2',
	'surname'=>'Example2',
	'phone'=>'553535',

]);
$destroyAll = $connection->destroy('students');
$delete = $connection->delete('students','1');






