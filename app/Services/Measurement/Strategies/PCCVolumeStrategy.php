<?php

namespace App\Services\Measurement\Strategies;



class PCCVolumeStrategy implements MeasurementStrategy
{

    public function calculate(array $data): float
    {
        $nos = $data['nos'] ?? 0;
        $length = $data['length'] ?? 0;
        $width = $data['width'] ?? 0;
        $thickness = $data['thickness_ft'] ?? 0;

        return $nos * $length * $width * $thickness;
    }
}
