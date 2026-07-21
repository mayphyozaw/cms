<?php

namespace App\Services\Measurement\Strategies;


class ConcreteSlabVolumeStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        return $data['length'] * $data['width'] * $data['thickness_ft'];
    }
}