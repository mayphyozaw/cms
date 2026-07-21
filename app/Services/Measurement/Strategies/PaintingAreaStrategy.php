<?php

namespace App\Services\Measurement\Strategies;

class PaintingAreaStrategy implements MeasurementStrategy
{
    
    public function calculate(array $data): float
    {
        return ($data['length'] + $data['width'])
            * 2
            * $data['height'];
    }
}