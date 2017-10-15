<?php
namespace MasterSE\CarDealer\View;

use MasterSE\CarDealer\Domain\Model\Car;

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
        echo '<li>VIN: ' . $car->getVin() . '</li>';
        echo '<li>Color: ' . $car->getColor() . '</li>';

        foreach ($car->getTires() as $index => $tire) {
            echo '<li>Tire: #' . ($index + 1);
            echo '<ul>';
            echo '<li>Tread depth:' . $tire->getTreadDepth() . '</li>';
            echo '<li>Pressure:' . $tire->getPressure() . '</li>';
            echo '</ul>';
            echo '</li>';
        }

        echo '</ul>';
    }
}