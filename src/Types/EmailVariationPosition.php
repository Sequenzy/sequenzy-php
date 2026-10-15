<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Where the user placed it on the editor canvas, in canvas pixels. Null means the canvas places it automatically.
 */
class EmailVariationPosition extends JsonSerializableType
{
    /**
     * @var ?int $x
     */
    #[JsonProperty('x')]
    public ?int $x;

    /**
     * @var ?int $y
     */
    #[JsonProperty('y')]
    public ?int $y;

    /**
     * @param array{
     *   x?: ?int,
     *   y?: ?int,
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
