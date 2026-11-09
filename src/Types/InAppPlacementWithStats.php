<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\InAppPlacement;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;

class InAppPlacementWithStats extends JsonSerializableType
{
    use InAppPlacement;

    /**
     * @var ?InAppPlacementStats $stats
     */
    #[JsonProperty('stats')]
    public ?InAppPlacementStats $stats;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   description?: ?string,
     *   height?: ?int,
     *   key?: ?string,
     *   name?: ?string,
     *   updatedAt?: ?DateTime,
     *   width?: ?int,
     *   stats?: ?InAppPlacementStats,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->stats = $values['stats'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
