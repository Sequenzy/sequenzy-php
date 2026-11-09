<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppPlacement;
use Sequenzy\Core\Json\JsonProperty;

class CreateInAppPlacementResponse extends JsonSerializableType
{
    /**
     * @var ?InAppPlacement $placement
     */
    #[JsonProperty('placement')]
    public ?InAppPlacement $placement;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   placement?: ?InAppPlacement,
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
