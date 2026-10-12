<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetInAppStepStatsResponseStats extends JsonSerializableType
{
    /**
     * @var ?int $clicked
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @var ?int $created
     */
    #[JsonProperty('created')]
    public ?int $created;

    /**
     * @var ?int $dismissed
     */
    #[JsonProperty('dismissed')]
    public ?int $dismissed;

    /**
     * @var ?int $displayed
     */
    #[JsonProperty('displayed')]
    public ?int $displayed;

    /**
     * @param array{
     *   clicked?: ?int,
     *   created?: ?int,
     *   dismissed?: ?int,
     *   displayed?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicked = $values['clicked'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->dismissed = $values['dismissed'] ?? null;
        $this->displayed = $values['displayed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
