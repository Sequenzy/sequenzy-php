<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\ListSequenceStepConditionalBlockSubscribersRequestBranch;
use DateTime;
use Sequenzy\Analytics\Types\ListSequenceStepConditionalBlockSubscribersRequestPeriod;

class ListSequenceStepConditionalBlockSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?string $abTestVariantId
     */
    public ?string $abTestVariantId;

    /**
     * @var value-of<ListSequenceStepConditionalBlockSubscribersRequestBranch> $branch
     */
    public string $branch;

    /**
     * @var ?DateTime $end
     */
    public ?DateTime $end;

    /**
     * @var ?string $goalId
     */
    public ?string $goalId;

    /**
     * @var ?bool $includeMachineEngagement
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?value-of<ListSequenceStepConditionalBlockSubscribersRequestPeriod> $period
     */
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   branch: value-of<ListSequenceStepConditionalBlockSubscribersRequestBranch>,
     *   abTestVariantId?: ?string,
     *   end?: ?DateTime,
     *   goalId?: ?string,
     *   includeMachineEngagement?: ?bool,
     *   limit?: ?int,
     *   page?: ?int,
     *   period?: ?value-of<ListSequenceStepConditionalBlockSubscribersRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->abTestVariantId = $values['abTestVariantId'] ?? null;
        $this->branch = $values['branch'];
        $this->end = $values['end'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
