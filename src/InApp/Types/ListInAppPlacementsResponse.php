<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppPlacementWithStats;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListInAppPlacementsResponse extends JsonSerializableType
{
    /**
     * @var ?array<InAppPlacementWithStats> $placements
     */
    #[JsonProperty('placements'), ArrayType([InAppPlacementWithStats::class])]
    public ?array $placements;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   placements?: ?array<InAppPlacementWithStats>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->placements = $values['placements'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
