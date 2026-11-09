<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetInAppPlacementContentResponse extends JsonSerializableType
{
    /**
     * @var ?array<GetInAppPlacementContentResponsePlacementsItem> $placements
     */
    #[JsonProperty('placements'), ArrayType([GetInAppPlacementContentResponsePlacementsItem::class])]
    public ?array $placements;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   placements?: ?array<GetInAppPlacementContentResponsePlacementsItem>,
     *   subscriberId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->placements = $values['placements'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
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
