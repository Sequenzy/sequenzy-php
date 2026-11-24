<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\ListSequencePathSubscribersRequestBucket;
use DateTime;
use Sequenzy\Analytics\Types\ListSequencePathSubscribersRequestPeriod;

class ListSequencePathSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListSequencePathSubscribersRequestBucket> $bucket Optional synthetic bucket filter (unmapped for earlier graph versions, unrecorded for legacy rows). Mutually exclusive with pathId.
     */
    public ?string $bucket;

    /**
     * @var ?int $conversionWindowDays Conversion window in whole days.
     */
    public ?int $conversionWindowDays;

    /**
     * @var ?DateTime $end
     */
    public ?DateTime $end;

    /**
     * @var ?string $eventName Optional event name. Mutually exclusive with goalId.
     */
    public ?string $eventName;

    /**
     * @var ?string $goalId Optional goal ID or default-revenue. Mutually exclusive with eventName.
     */
    public ?string $goalId;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?string $pathId Optional configured path ID for branch or condition nodes (branch id, else, continued, or exited). Mutually exclusive with bucket.
     */
    public ?string $pathId;

    /**
     * @var ?value-of<ListSequencePathSubscribersRequestPeriod> $period
     */
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   bucket?: ?value-of<ListSequencePathSubscribersRequestBucket>,
     *   conversionWindowDays?: ?int,
     *   end?: ?DateTime,
     *   eventName?: ?string,
     *   goalId?: ?string,
     *   limit?: ?int,
     *   page?: ?int,
     *   pathId?: ?string,
     *   period?: ?value-of<ListSequencePathSubscribersRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bucket = $values['bucket'] ?? null;
        $this->conversionWindowDays = $values['conversionWindowDays'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->pathId = $values['pathId'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
