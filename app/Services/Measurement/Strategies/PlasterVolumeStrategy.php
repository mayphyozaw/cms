<?php

namespace App\Services\Measurement\Strategies;


class PlasterVolumeStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        return 2 * ($data['length'] + $data['width']) * $data['height']* $data['thickness_ft'];
    }
}