<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentResumeResponseEnqueueErrorsItem extends JsonSerializableType
{
    /**
     * @var ?string $enrollmentId
     */
    #[JsonProperty('enrollmentId')]
    public ?string $enrollmentId;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @param array{
     *   enrollmentId?: ?string,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enrollmentId = $values['enrollmentId'] ?? null;
        $this->error = $values['error'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
