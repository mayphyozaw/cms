<?php

namespace App\Services\Measurement;

use App\Models\Project;
use Illuminate\Http\Request;


class MeasurementCalculationService
{


    public function calculate(string $formulaType, array $data): float
    {

        return MeasurementStrategyFactory::make($formulaType)
            ->calculate($data);
    }

    public function calculateArea(
        float $length,
        float $width
    ): float {

        return $this->calculate('area', [
            'length' => $length,
            'width' => $width,
        ]);
    }

    public function calculateVolume(
        float $length,
        float $width,
        float $height
    ): float {

        return $this->calculate('volume', [
            'length' => $length,
            'width' => $width,
            'height' => $height,
        ]);
    }
}
