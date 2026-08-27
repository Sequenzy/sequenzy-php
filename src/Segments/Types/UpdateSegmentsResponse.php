<?php

namespace Sequenzy\Segments\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Segment;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateSegmentsResponse extends JsonSerializableType
{
    /**
     * @var ?Segment $segment
     */
    #[JsonProperty('segment')]
    public ?Segment $segment;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings Non-fatal cautions, such as an attribute filter referencing a custom attribute no subscriber has a synced value for (which would match no subscribers, or every subscriber for exclusion operators like is_empty). Absent when there is nothing to warn about.
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   segment?: ?Segment,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->segment = $values['segment'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
