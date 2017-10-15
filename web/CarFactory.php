<?php
namespace MasterSE\CarDealer;

class CarFactory
{
    /**
     * @var Brand[]
     */
    private $brands = [];

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
        $brand = $this->createBrand($data['brand']);
        $tires = array_map(
            function (array $tireData) {
                return $this->createTire($tireData);
            },
            $data['tires']
        );

        $car = new Car(
            $brand,
            $data['vin'],
            $data['color']
        );
        $car->setTires($tires);

        return $car;
    }

    /**
     * Reuses brand if known already,
     * otherwise creates new instance.
     * @param array $data
     * @return Brand
     */
    private function createBrand(array $data): Brand
    {
        $name = $data['name'];
        if (!isset($this->brands[$name])) {
            $this->brands[$name] = new Brand($name);
        }
        return $this->brands[$name];
    }

    /**
     * @param array $data
     * @return Tire
     */
    private function createTire(array $data): Tire
    {
        return new Tire(
            $data['treadDepth'],
            $data['pressure']
        );
    }
}
