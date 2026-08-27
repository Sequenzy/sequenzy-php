<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * How often one visitor sees the popup. Merged key by key.
 */
class SavedPopupFrequency extends JsonSerializableType
{
    /**
     * @var ?int $maxDisplays
     */
    #[JsonProperty('maxDisplays')]
    public ?int $maxDisplays;

    /**
     * @var ?int $windowDays
     */
    #[JsonProperty('windowDays')]
    public ?int $windowDays;

    /**
     * @param array{
     *   maxDisplays?: ?int,
     *   windowDays?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->maxDisplays = $values['maxDisplays'] ?? null;
        $this->windowDays = $values['windowDays'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
