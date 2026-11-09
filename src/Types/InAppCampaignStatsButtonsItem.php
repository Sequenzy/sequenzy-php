<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class InAppCampaignStatsButtonsItem extends JsonSerializableType
{
    /**
     * @var ?string $buttonId
     */
    #[JsonProperty('buttonId')]
    public ?string $buttonId;

    /**
     * @var ?int $clicked
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @param array{
     *   buttonId?: ?string,
     *   clicked?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttonId = $values['buttonId'] ?? null;
        $this->clicked = $values['clicked'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
