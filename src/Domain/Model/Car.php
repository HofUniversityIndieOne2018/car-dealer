<?php
namespace MasterSE\CarDealer\Domain\Model;

class Car
{
    /**
     * @var Brand
     */
    private $brand;

    /**
     * @var string
     */
    private $vin;

    /**
     * @var Tire[]
     */
    private $tires = [];

    /**
     * @var string
     */
    private $color;

    /**
     * @param Brand $brand
     * @param string $vin
     * @param string $color
     */
    public function __construct(Brand $brand, string $vin, string $color)
    {
        $this->brand = $brand;
        $this->vin = $vin;
        $this->color = $color;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getVin(): string
    {
        return $this->vin;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return Tire[]
     */
    public function getTires(): array
    {
        return $this->tires;
    }

    /**
     * @param Tire[] $tires
     */
    public function setTires(array $tires)
    {
        $this->tires = $tires;
    }

    /**
     * @param Tire $attachTire
     */
    public function attachTire(Tire $attachTire)
    {
        // 3rd argument for in_array() uses type-safe comparison
        if (in_array($attachTire, $this->tires, true)) {
            return;
        }
        $this->tires[] = $attachTire;
    }

    /**
     * @param Tire $detachTire
     */
    public function detachTire(Tire $detachTire)
    {
        // 3rd argument for array_search() uses type-safe comparison
        $tireIndex = array_search($detachTire, $this->tires, true);
        if ($tireIndex === false) {
            return;
        }
        unset($this->tires[$tireIndex]);
    }
}
