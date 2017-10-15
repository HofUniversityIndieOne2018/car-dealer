<?php
namespace MasterSE\CarDealer\Domain\Model;

class Tire
{
    /**
     * @var float
     */
    private $treadDepth;

    /**
     * @var float
     */
    private $pressure;

    /**
     * @param float $treadDepth
     * @param float $pressure
     */
    public function __construct(float $treadDepth, float $pressure)
    {
        $this->treadDepth = $treadDepth;
        $this->pressure = $pressure;
    }

    /**
     * @return float
     */
    public function getTreadDepth(): float
    {
        return $this->treadDepth;
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }
}
