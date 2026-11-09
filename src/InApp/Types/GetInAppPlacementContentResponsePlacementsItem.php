<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppMessage;
use Sequenzy\Core\Json\JsonProperty;

class GetInAppPlacementContentResponsePlacementsItem extends JsonSerializableType
{
    /**
     * @var ?InAppMessage $message
     */
    #[JsonProperty('message')]
    public ?InAppMessage $message;

    /**
     * @var ?string $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @param array{
     *   message?: ?InAppMessage,
     *   placement?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->placement = $values['placement'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
