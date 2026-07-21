<?php

namespace App\Services\Measurement\Strategies;



class NosVolumeStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        return $data['nos'] * $data['length'] * $data['width'] * $data['height'];
    }
}