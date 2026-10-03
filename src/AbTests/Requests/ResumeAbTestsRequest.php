<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ResumeAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $confirmLiveChange Required as true when the sequence is active.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

    /**
     * @param array{
     *   confirmLiveChange?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
    }
}
