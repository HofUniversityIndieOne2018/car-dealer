<?php
namespace MasterSE\CarDealer\View;

use MasterSE\CarDealer\Domain\Model\Car;

class CarView
{
    /**
     * @param array $cars
     * @return string
     */
    public function renderMultiple(array $cars): string
    {
        $content = '';
        foreach ($cars as $car)	{
            $content .= $this->renderSingle($car);
        }
        return $content;
    }

    /**
     * @param Car $car
     * @return string
     */
    public function renderSingle(Car $car): string
    {
        $content = '<ul>';
        $content .= '<li>Brand: ' . $car->getBrand()->getName() . '</li>';
        $content .= '<li>VIN: ' . $car->getVin() . '</li>';
        $content .= '<li>Color: ' . $car->getColor() . '</li>';

        foreach ($car->getTires() as $index => $tire) {
            $content .= '<li>Tire: #' . ($index + 1);
            $content .= '<ul>';
            $content .= '<li>Tread depth:' . $tire->getTreadDepth() . '</li>';
            $content .= '<li>Pressure:' . $tire->getPressure() . '</li>';
            $content .= '</ul>';
            $content .= '</li>';
        }

        $content .= '</ul>';
        return $content;
    }
}