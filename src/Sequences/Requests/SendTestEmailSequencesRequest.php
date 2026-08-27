<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SendTestEmailSequencesRequest extends JsonSerializableType
{
    /**
     * @var array<string> $recipients Internal reviewer email addresses. Duplicate addresses are sent only once.
     */
    #[JsonProperty('recipients'), ArrayType(['string'])]
    public array $recipients;

    /**
     * @param array{
     *   recipients: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->recipients = $values['recipients'];
    }
}
