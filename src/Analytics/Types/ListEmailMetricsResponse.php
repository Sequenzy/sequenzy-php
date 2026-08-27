<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Types\Pagination;

class ListEmailMetricsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListEmailMetricsResponseEmailsItem> $emails
     */
    #[JsonProperty('emails'), ArrayType([ListEmailMetricsResponseEmailsItem::class])]
    public ?array $emails;

    /**
     * @var ?value-of<ListEmailMetricsResponseEmailType> $emailType
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var ?DateTime $end
     */
    #[JsonProperty('end'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $end;

    /**
     * @var ?string $order
     */
    #[JsonProperty('order')]
    public ?string $order;

    /**
     * @var ?Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?Pagination $pagination;

    /**
     * @var ?string $period
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?array<string> $sequenceIds Echo of the sequence IDs the breakdown was scoped to.
     */
    #[JsonProperty('sequenceIds'), ArrayType(['string'])]
    public ?array $sequenceIds;

    /**
     * @var ?string $sort
     */
    #[JsonProperty('sort')]
    public ?string $sort;

    /**
     * @var ?DateTime $start
     */
    #[JsonProperty('start'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $start;

    /**
     * @var ?int $step Echo of the step filter, present only when one was requested.
     */
    #[JsonProperty('step')]
    public ?int $step;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string, mixed> $totals Summed funnel across every matching email, not just this page, plus emails, conversions, and revenueCents.
     */
    #[JsonProperty('totals'), ArrayType(['string' => 'mixed'])]
    public ?array $totals;

    /**
     * @param array{
     *   emails?: ?array<ListEmailMetricsResponseEmailsItem>,
     *   emailType?: ?value-of<ListEmailMetricsResponseEmailType>,
     *   end?: ?DateTime,
     *   order?: ?string,
     *   pagination?: ?Pagination,
     *   period?: ?string,
     *   sequenceIds?: ?array<string>,
     *   sort?: ?string,
     *   start?: ?DateTime,
     *   step?: ?int,
     *   success?: ?bool,
     *   totals?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->sequenceIds = $values['sequenceIds'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->start = $values['start'] ?? null;
        $this->step = $values['step'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->totals = $values['totals'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
