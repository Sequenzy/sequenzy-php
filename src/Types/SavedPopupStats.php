<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The popup funnel - shown, started, submitted - with rates derived from the raw counters. A rate is null rather than 0 when its denominator is zero, so "nobody has seen it yet" never reads as "nobody converted".
 */
class SavedPopupStats extends JsonSerializableType
{
    /**
     * @var ?float $completionRate conversions / starts, 0-1. Null when nobody has started it.
     */
    #[JsonProperty('completionRate')]
    public ?float $completionRate;

    /**
     * @var ?float $conversionRate conversions / views, 0-1. Null when the popup has no views.
     */
    #[JsonProperty('conversionRate')]
    public ?float $conversionRate;

    /**
     * @var ?int $conversions
     */
    #[JsonProperty('conversions')]
    public ?int $conversions;

    /**
     * @var ?float $startRate starts / views, 0-1. Null when the popup has no views.
     */
    #[JsonProperty('startRate')]
    public ?float $startRate;

    /**
     * @var ?int $starts
     */
    #[JsonProperty('starts')]
    public ?int $starts;

    /**
     * @var ?int $views
     */
    #[JsonProperty('views')]
    public ?int $views;

    /**
     * @param array{
     *   completionRate?: ?float,
     *   conversionRate?: ?float,
     *   conversions?: ?int,
     *   startRate?: ?float,
     *   starts?: ?int,
     *   views?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->completionRate = $values['completionRate'] ?? null;
        $this->conversionRate = $values['conversionRate'] ?? null;
        $this->conversions = $values['conversions'] ?? null;
        $this->startRate = $values['startRate'] ?? null;
        $this->starts = $values['starts'] ?? null;
        $this->views = $values['views'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
