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

* move the model classes and factory class to directory `Domain/Model` and use namespace `MasterSE\CarDealer\Domain\Model` for all of them
* get rid of the hard-coded `require` or `require_once` expressions
* introduce `CarView` in namespace `MasterSE\CarDealer\View`
    + introduce HTML output for the cars created by `CarFactory`
* define PSR-4 autoloading using composer

## Preparation

* create a new `src/` directory in the parent directory `php-basics/`
* move all class files after creating the `Domain/Model` and `View` directory to the new `src/` directory

It should look like the following:

```
+ php-basics/
  + src/
    + Domain/
      + Model/
        + Brand.php
        + Car.php
        + CarFactory.php
        + Tire.php
    + View/
      + CarView.php
  + web/
    + index.php
```

## Switch to Docker container

It's assumed that your Docker environment is active by having called
`docker-compose up -d` in the directory containing the `docker-compose.yml` file.

* `docker ps` and search `container-id` of any PHP7 container
* `docker exec -it <container-id> bash`
* `cd php-basics`

## Composer configuration

By calling `composer init` in the console you'll get something like the following:

```
This command will guide you through creating your composer.json config.

Package name (<vendor>/<name>) [olly/php-basics]: master-se/car-dealer
Description []: The car dealer project
Author [Oliver Hader <oliver@typo3.org>, n to skip]: John Doe <john@doe.org>
Minimum Stability []:
Package Type (e.g. library, project, metapackage, composer-plugin) []: project
License []: MIT

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? no

{
    "name": "master-se/car-dealer",
    "description": "The car dealer project",
    "type": "project",
    "license": "MIT",
    "authors": [
        {
            "name": "John Doe",
            "email": "john@doe.org"
        }
    ],
    "require": {}
}
```

Extend the generated `composer.json` so it looks like the following:

``` {.json .numberLines}
{
	// ...
	"require": {},
	"autoload": {
		"psr-4": {
			"MasterSE\\CarDealer\\": "src/",
			"MasterSE\\CarDealer\\Tests\\": "tests/"
		}
	}
}
```

Finally execute a `composer dump-autoload` in the console. A new `vendor/`
directory should have been created containing the generated `autoload.php` file.

After that we can `exit` the Docker container again.

## CarView.php

``` {.php .numberLines}
<?php
namespace MasterSE\CarDealer\View;

class CarView
{
	public function renderMultiple(array $cars)
	{
		foreach ($cars as $car)	{
			$this->renderSingle($car);
		}
	}

	public function renderSingle(Car $car)
	{
		echo '<ul>';
		echo '<li>Brand: ' . $car->getBrand()->getName() . '</li>';
		// @todo implement output for all other car properties

		foreach ($car->getTires() as $index => $tire) {
			echo '<li>Tire: #' . ($index + 1);
			echo '<ul>';
			// @todo implement output for tire properties
			// echo '<li>Tread depth: ...</li>';
			echo '</ul>';
			echo '</li>';
		}

		echo '</ul>';
	}
}
```

## Adjusted index.php

The `index.php` file still stays in the `web/` folder. In the beginning the
auto-loader file of Composer has to be loaded.

``` {.php .numberLines}
<?php
// only make use of Composer class auto-loader
require_once __DIR__ . '/../vendor/autoload.php';

$data = [
	// ...
];
$factory = new \MasterSE\CarDealer\Domain\Model\CarFactory();
$cars = $factory->createMultipleCars($data):

$view = new \MasterSE\CarDealer\View\CarView();
$view->renderMultiple($cars);
```