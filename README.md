# PHP Basics: Car dealer exercises

The following repository contains possible outcome of the provided exercises:

* step-0: Hello World example
* step-1: Car domain model
* step-2: Namespaces and class files
* step-3: PSR-4 Composer refactoring
* step-4: MVC refactoring

It's possible to checkout each state locally using Git by selecting the
according step as branch name. The following example switches to `step-1`.

```
git checkout step-1
```

# Exercise for this step

**Tasks**

* refactor your code and put every class in a separate file for each class
    + use same file name as used for class name, e.g. `Car` will be in `Car.php`
* introduce namespaces for your classes using `MasterSE\CarDealer` as base
* use e.g. `require_once 'Car.php'` for each class that shall be used
* introduce a `CarFactory` class to create objects from a PHP array

## Parts of new CarFactory.php

``` {.php .numberLines}
<?php
namespace MasterSE\CarDealer;

class CarFactory
{
	/**
	 * @param array $data
	 * @return Car[]
	 */
	public function createMultiple($data): array
	{
		return array_map(
			function (array $carData) {
				return $this->createSingle($carData);
			},
			$data
		);
	}

	/**
	 * @param array $data
	 * @return Car
	 */
	public function createSingle(array $data): Car
	{
		$brand = new Brand($data['brand']['name']);
		$car = new Car(...);
		return $car;
	}
}
```

## Adjusted index.php

``` {.php .numberLines}
<?php
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
```