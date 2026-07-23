<?php

namespace App\Services\Measurement\Strategies;


class BrickWallAreaStrategy implements MeasurementStrategy
{
    public function calculate(array $data): float
    {
        $nos = (float) ($data['nos'] ?? 0);
        $length = (float) ($data['length'] ?? 0);
        $width = (float) ($data['width'] ?? 0);
        $height = (float) ($data['height'] ?? 0);

        return $nos * (2 * ($length + $width) * $height);
        
    }
}