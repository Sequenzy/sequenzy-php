<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SequenceCreateResponse;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceCreateResponseEventTracking;
use Sequenzy\Types\SequenceCreateResponseSequence;

class GenerateSequencesResponse extends JsonSerializableType
{
    use SequenceCreateResponse;

    /**
     * @var ?bool $deprecated
     */
    #[JsonProperty('deprecated')]
    public ?bool $deprecated;

    /**
     * @var ?string $deprecationMessage
     */
    #[JsonProperty('deprecationMessage')]
    public ?string $deprecationMessage;

    /**
     * @param array{
     *   eventTracking?: ?SequenceCreateResponseEventTracking,
     *   eventTrackingCode?: ?string,
     *   message?: ?string,
     *   requiredEvents?: ?array<string>,
     *   sequence?: ?SequenceCreateResponseSequence,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     *   deprecated?: ?bool,
     *   deprecationMessage?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventTracking = $values['eventTracking'] ?? null;
        $this->eventTrackingCode = $values['eventTrackingCode'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->requiredEvents = $values['requiredEvents'] ?? null;
        $this->sequence = $values['sequence'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
        $this->deprecated = $values['deprecated'] ?? null;
        $this->deprecationMessage = $values['deprecationMessage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
