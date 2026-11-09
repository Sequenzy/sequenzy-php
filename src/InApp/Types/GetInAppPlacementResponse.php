<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppPlacementWithStats;
use Sequenzy\Core\Json\JsonProperty;

class GetInAppPlacementResponse extends JsonSerializableType
{
    /**
     * @var ?InAppPlacementWithStats $placement
     */
    #[JsonProperty('placement')]
    public ?InAppPlacementWithStats $placement;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   placement?: ?InAppPlacementWithStats,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->placement = $values['placement'] ?? null;
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
