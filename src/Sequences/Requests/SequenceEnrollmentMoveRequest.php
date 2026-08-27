<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Sequences\Types\SequenceEnrollmentMoveRequestSort;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentMoveRequest extends JsonSerializableType
{
    /**
     * @var ?float $dailyLimit Refuses to move more than this many enrollments onto targetNodeId in a rolling 24 hours, counting the moves recorded by earlier calls.
     */
    #[JsonProperty('dailyLimit')]
    public ?float $dailyLimit;

    /**
     * @var ?bool $dryRun When true (the default), reports which enrollments would move without moving them.
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var string $fromNodeId Node ID the contacts are currently sitting on, such as the delay step they are waiting at.
     */
    #[JsonProperty('fromNodeId')]
    public string $fromNodeId;

    /**
     * @var ?float $limit Maximum enrollments to move in this call. Defaults to 100, maximum 500.
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?string $reason Note stored on every moved enrollment and returned as moveReason when listing enrollments.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<SequenceEnrollmentMoveRequestSort> $sort Which enrollments to take first. Defaults to wait_until_asc, the contacts that have been waiting longest for their next step.
     */
    #[JsonProperty('sort')]
    public ?string $sort;

    /**
     * @var ?array<string> $subscriberIds Optional narrowing filter. Only move these subscribers, up to 500.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @var ?array<string> $tags Existing tag names applied to the moved contacts. Requires the subscribers:tag scope. Applying them never enrolls contacts in tag_added sequences.
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?string $targetNodeId Node ID to move them onto. Defaults to the source step's only next step, and is required when that step branches or is terminal. Cannot be the trigger node.
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   fromNodeId: string,
     *   dailyLimit?: ?float,
     *   dryRun?: ?bool,
     *   limit?: ?float,
     *   reason?: ?string,
     *   sort?: ?value-of<SequenceEnrollmentMoveRequestSort>,
     *   subscriberIds?: ?array<string>,
     *   tags?: ?array<string>,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dailyLimit = $values['dailyLimit'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->fromNodeId = $values['fromNodeId'];
        $this->limit = $values['limit'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->targetNodeId = $values['targetNodeId'] ?? null;
    }
}
