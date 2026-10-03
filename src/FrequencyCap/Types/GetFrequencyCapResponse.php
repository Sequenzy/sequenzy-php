<?php

namespace Sequenzy\FrequencyCap\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\FrequencyCap;
use Sequenzy\Core\Json\JsonProperty;

class GetFrequencyCapResponse extends JsonSerializableType
{
    /**
     * @var ?FrequencyCap $frequencyCap
     */
    #[JsonProperty('frequencyCap')]
    public ?FrequencyCap $frequencyCap;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   frequencyCap?: ?FrequencyCap,
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
