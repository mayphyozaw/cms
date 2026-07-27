<?php

namespace App\Services\Measurement\Strategies;



class PlasterAreaStrategy implements MeasurementStrategy
{

    public function calculate(array $data): float
    {
        
        $length = $data['length'] ?? 0;
        $height = $data['height'] ?? 0;
        

        return  $length * $height;
    }
}
