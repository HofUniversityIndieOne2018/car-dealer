<?php
// only make use of Composer class auto-loader
require_once __DIR__ . '/../vendor/autoload.php';

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

$factory = new \MasterSE\CarDealer\Domain\Model\CarFactory();
$cars = $factory->createMultiple($data);

$view = new \MasterSE\CarDealer\View\CarView();
$view->renderMultiple($cars);
