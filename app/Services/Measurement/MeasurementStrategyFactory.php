<?php

namespace App\Services\Measurement;

use App\Services\Measurement\Strategies\AreaStrategy;
use App\Services\Measurement\Strategies\BrickWallAreaStrategy;
use App\Services\Measurement\Strategies\CoatsAreaStrategy;
use App\Services\Measurement\Strategies\ConcreteSlabVolumeStrategy;
use App\Services\Measurement\Strategies\LinearStrategy;
use App\Services\Measurement\Strategies\NosVolumeStrategy;
use App\Services\Measurement\Strategies\PaintingAreaStrategy;
use App\Services\Measurement\Strategies\PCCVolumeStrategy;
use App\Services\Measurement\Strategies\PlasterAreaStrategy;
use App\Services\Measurement\Strategies\PlasterVolumeStrategy;
use App\Services\Measurement\Strategies\SimpleVolumeStrategy;
use App\Services\Measurement\Strategies\WallAreaStrategy;
use App\Services\Measurement\Strategies\WeightStrategy;

class MeasurementStrategyFactory
{
    public static function make(string $formulaType)
    {
        return match ($formulaType) {

            'volume',
            'rcc_footing',
            => new SimpleVolumeStrategy(),

            'pcc_volume',
            => new PCCVolumeStrategy(),

            'excavation_volume',
            'pcc_1:3:6',
            'rcc_column'
            => new NosVolumeStrategy(),

            'area',
            'screed_area',
            'concrete_slab_area',
            'mortar_bed_area'
            => new AreaStrategy(),

            'wall_area',
            => new WallAreaStrategy(),
            'brick_wall_area'
            => new BrickWallAreaStrategy(),

            'painting_area',
            => new PaintingAreaStrategy(),
           
            'plaster_area'
            => new PlasterAreaStrategy(),

            'coats_area'
            => new CoatsAreaStrategy(),

            'plaster_volume'
            => new PlasterVolumeStrategy(),

            'concrete_slab_volume'
            => new ConcreteSlabVolumeStrategy(),

            'steel_linear',
            'steel_handrail_linear'
            => new LinearStrategy(),

            'weight'
            => new WeightStrategy(),

            ''
            => new MeasurementCalculationService(),

            default => throw new \Exception(
                "Unsupported Formula Type : {$formulaType}"
            )
        };
    }
}
