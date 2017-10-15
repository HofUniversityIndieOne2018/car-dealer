<?php
require_once 'Brand.php';
require_once 'Car.php';
require_once 'Tire.php';
require_once 'CarFactory.php';

$data = [
	[
		'vin' => 'WDB12345600000001',
		'color' => 'orange',
		'brand' => ['name' => 'Mercedes'],
		'tires' => [
			['treadDepth' => 8.0, 'pressure' => 3.2],
			['treadDepth' => 8.0, 'pressure' => 3.2],
			['treadDepth' => 8.0, 'pressure' => 3.2],
			['treadDepth' => 8.0, 'pressure' => 3.2],
		]
	],
	[
		'vin' => 'WDB12345600000002',
		'color' => 'green',
		'brand' => ['name' => 'Mercedes'],
		'tires' => [
			['treadDepth' => 5.5, 'pressure' => 3.1],
			['treadDepth' => 5.5, 'pressure' => 3.1],
			['treadDepth' => 5.5, 'pressure' => 3.1],
			['treadDepth' => 5.5, 'pressure' => 3.1],
		]
	]
];

$factory = new \MasterSE\CarDealer\CarFactory();
$cars = $factory->createMultiple($data);

var_dump($cars);
