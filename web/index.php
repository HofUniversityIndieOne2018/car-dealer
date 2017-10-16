<?php
// only make use of Composer class auto-loader
require_once __DIR__ . '/../vendor/autoload.php';

$controller = new \MasterSE\CarDealer\Controller\CarController(
    new \MasterSE\CarDealer\Domain\Model\CarFactory(),
    new \MasterSE\CarDealer\View\CarView()
);
echo $controller->listAction();
