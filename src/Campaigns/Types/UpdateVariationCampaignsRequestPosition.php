<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Where the variation sits on the editor canvas, in canvas pixels. Null lets the canvas place it automatically. Moving a variation does not change updatedAt.
 */
class UpdateVariationCampaignsRequestPosition extends JsonSerializableType
{
    /**
     * @var ?float $x
     */
    #[JsonProperty('x')]
    public ?float $x;

    /**
     * @var ?float $y
     */
    #[JsonProperty('y')]
    public ?float $y;

    /**
     * @param array{
     *   x?: ?float,
     *   y?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->x = $values['x'] ?? null;
        $this->y = $values['y'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
