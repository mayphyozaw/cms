<?php

namespace App\Services\Measurement\Strategies;



class SimpleVolumeStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        return $data['length'] * $data['width'] * $data['height'];
    }
}