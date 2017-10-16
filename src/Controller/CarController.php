<?php
namespace MasterSE\CarDealer\Controller;

use MasterSE\CarDealer\Domain\Model\CarFactory;
use MasterSE\CarDealer\View\CarView;

class CarController
{
    /**
     * @var CarFactory
     */
    private $factory;

    /**
     * @var CarView
     */
    private $view;

    /**
     * @param CarFactory $factory
     * @param CarView $view
     */
    public function __construct(CarFactory $factory, CarView $view)
    {
        $this->factory = $factory;
        $this->view = $view;
    }

    /**
     * @return string
     */
    public function listAction(): string
    {
        $cars = $this->factory
            ->createMultiple($this->retrieveData());
        return $this->view
            ->renderMultiple($cars);
    }

    /**
     * @return array
     */
    private function retrieveData(): array
    {
        return [
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
    }
}