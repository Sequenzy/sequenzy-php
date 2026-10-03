<?php

namespace Sequenzy\FrequencyCap\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ClearFrequencyCapResponse extends JsonSerializableType
{
    /**
     * @var mixed $frequencyCap Always null after clearing.
     */
    #[JsonProperty('frequencyCap')]
    public mixed $frequencyCap;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   frequencyCap?: mixed,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->frequencyCap = $values['frequencyCap'] ?? null;
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
