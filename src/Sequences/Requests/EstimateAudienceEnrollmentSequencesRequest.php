<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceAudience;
use Sequenzy\Core\Json\JsonProperty;

class EstimateAudienceEnrollmentSequencesRequest extends JsonSerializableType
{
    /**
     * @var SequenceAudience $audience
     */
    #[JsonProperty('audience')]
    public SequenceAudience $audience;

    /**
     * @param array{
     *   audience: SequenceAudience,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'];
    }
}
