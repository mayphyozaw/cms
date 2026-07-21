<?php

namespace App\Services\Measurement\Strategies;



class AreaStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        return $data['length'] * $data['width'];
    }
}