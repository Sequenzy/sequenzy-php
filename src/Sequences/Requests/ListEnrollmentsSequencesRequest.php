<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Sequences\Types\ListEnrollmentsSequencesRequestSort;

class ListEnrollmentsSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $currentNodeId Comma-separated sequence node IDs. Only enrollments currently sitting on one of these nodes are returned.
     */
    public ?string $currentNodeId;

    /**
     * @var ?string $email Exact email address to match, case-insensitive.
     */
    public ?string $email;

    /**
     * @var ?int $limit Enrollments per page. Values above 500 are capped, and above 100 when stopConditionMatch is true.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of enrollments to skip. Page until pagination.hasMore is false.
     */
    public ?int $offset;

    /**
     * @var ?value-of<ListEnrollmentsSequencesRequestSort> $sort Result order. Defaults to enrolled_at_desc. Enrollments with no scheduled resume sort last under wait_until ordering.
     */
    public ?string $sort;

    /**
     * @var ?string $status Comma-separated enrollment statuses: active, waiting, completed, failed, cancelled. Defaults to active,waiting.
     */
    public ?string $status;

    /**
     * @var ?bool $stopConditionMatch Annotate each returned active or waiting enrollment with whether the sequence stop condition already matches for that contact right now. Stop conditions are re-evaluated when an enrollment next runs a step, not when their event arrives, so a stopped contact keeps reporting waiting until its delay expires. Use this to confirm a stop event registered without waiting the delay out. Caps the page at 100 regardless of limit.
     */
    public ?bool $stopConditionMatch;

    /**
     * @var ?string $subscriberId Comma-separated subscriber IDs.
     */
    public ?string $subscriberId;

    /**
     * @param array{
     *   currentNodeId?: ?string,
     *   email?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     *   sort?: ?value-of<ListEnrollmentsSequencesRequestSort>,
     *   status?: ?string,
     *   stopConditionMatch?: ?bool,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currentNodeId = $values['currentNodeId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->stopConditionMatch = $values['stopConditionMatch'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
