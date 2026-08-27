<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * What put this contact into the sequence. The distinguishing detail when a trigger covers several lists or tags.
 */
class SequenceEnrollmentListResponseEnrollmentsItemEnteredVia extends JsonSerializableType
{
    /**
     * @var ?string $description Ready-to-display attribution line.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<SequenceEnrollmentListResponseEnrollmentsItemEnteredViaKind> $kind `inactivity` and `frequency` identify time-based evaluation of the monitored event rather than an ordinary event-received enrollment. `manual` is a dashboard or API enrollment that bypassed the trigger. `unknown` covers enrollments recorded before this field existed.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $name Resolved list or segment name. Set for list and segment kinds, and null when the referenced resource has since been deleted.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $value The list ID, tag name, segment ID, event name, or monitored event name. Null for `manual`, `test_run`, and `unknown`.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   description?: ?string,
     *   kind?: ?value-of<SequenceEnrollmentListResponseEnrollmentsItemEnteredViaKind>,
     *   name?: ?string,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
