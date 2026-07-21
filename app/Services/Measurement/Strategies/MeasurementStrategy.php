<?php

namespace App\Services\Measurement\Strategies;

interface MeasurementStrategy
{
    public function calculate(array $data): float;
}