<?php

namespace App\Services\Measurement\Strategies;

class LinearStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        return $data['length'];
    }
}