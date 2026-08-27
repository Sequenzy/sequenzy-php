<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentRealignRequest extends JsonSerializableType
{
    /**
     * @var ?string $cursor Opaque continuation cursor. When a response has hasMore true, pass its nextCursor here to continue after the enrollments already scanned.
     */
    #[JsonProperty('cursor')]
    public ?string $cursor;

    /**
     * @var ?bool $dryRun When true (the default), returns the new wait times without writing them. Set false to apply.
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?array<string> $nodeIds Step IDs to limit realignment to. Defaults to every step.
     */
    #[JsonProperty('nodeIds'), ArrayType(['string'])]
    public ?array $nodeIds;

    /**
     * @var ?array<string> $subscriberIds Up to 500 subscriber IDs to limit realignment to. Defaults to every waiting contact.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   cursor?: ?string,
     *   dryRun?: ?bool,
     *   nodeIds?: ?array<string>,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->nodeIds = $values['nodeIds'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }
}
