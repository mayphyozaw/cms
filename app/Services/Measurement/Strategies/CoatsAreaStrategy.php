<?php

namespace App\Services\Measurement\Strategies;



class CoatsAreaStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        return $data['length'] * $data['height'] * $data['coats'];
    }
}