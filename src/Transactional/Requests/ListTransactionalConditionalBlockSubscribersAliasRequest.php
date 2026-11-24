<?php

namespace Sequenzy\Transactional\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Transactional\Types\ListTransactionalConditionalBlockSubscribersAliasRequestBranch;
use DateTime;
use Sequenzy\Transactional\Types\ListTransactionalConditionalBlockSubscribersAliasRequestPeriod;

class ListTransactionalConditionalBlockSubscribersAliasRequest extends JsonSerializableType
{
    /**
     * @var value-of<ListTransactionalConditionalBlockSubscribersAliasRequestBranch> $branch
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
     * @var ?value-of<ListTransactionalConditionalBlockSubscribersAliasRequestPeriod> $period
     */
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   branch: value-of<ListTransactionalConditionalBlockSubscribersAliasRequestBranch>,
     *   end?: ?DateTime,
     *   goalId?: ?string,
     *   includeMachineEngagement?: ?bool,
     *   limit?: ?int,
     *   page?: ?int,
     *   period?: ?value-of<ListTransactionalConditionalBlockSubscribersAliasRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
