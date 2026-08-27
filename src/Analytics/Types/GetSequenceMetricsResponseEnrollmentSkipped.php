<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Trigger matches where the contact could not be enrolled because they are unsubscribed or bounced. Defaults to the last 30 days when no explicit time range is provided.
 */
class GetSequenceMetricsResponseEnrollmentSkipped extends JsonSerializableType
{
    /**
     * @var ?array<string, int> $byReason Skip counts keyed by reason (unsubscribed, bounced)
     */
    #[JsonProperty('byReason'), ArrayType(['string' => 'integer'])]
    public ?array $byReason;

    /**
     * @var ?int $count Total skipped enrollments in the window
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @param array{
     *   byReason?: ?array<string, int>,
     *   count?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->byReason = $values['byReason'] ?? null;
        $this->count = $values['count'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
