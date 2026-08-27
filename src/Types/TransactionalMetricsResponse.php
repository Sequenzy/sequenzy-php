<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class TransactionalMetricsResponse extends JsonSerializableType
{
    /**
     * @var ?TransactionalMetricsResponseBounceBreakdown $bounceBreakdown
     */
    #[JsonProperty('bounceBreakdown')]
    public ?TransactionalMetricsResponseBounceBreakdown $bounceBreakdown;

    /**
     * @var ?array<TransactionalMetricsResponseClickedLinksItem> $clickedLinks
     */
    #[JsonProperty('clickedLinks'), ArrayType([TransactionalMetricsResponseClickedLinksItem::class])]
    public ?array $clickedLinks;

    /**
     * @var ?TransactionalMetricsResponseComplaints $complaints
     */
    #[JsonProperty('complaints')]
    public ?TransactionalMetricsResponseComplaints $complaints;

    /**
     * @var ?DateTime $end
     */
    #[JsonProperty('end'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $end;

    /**
     * @var ?TransactionalMetricsResponseEngagementBreakdown $engagementBreakdown
     */
    #[JsonProperty('engagementBreakdown')]
    public ?TransactionalMetricsResponseEngagementBreakdown $engagementBreakdown;

    /**
     * @var ?string $period
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    #[JsonProperty('start'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $start;

    /**
     * @var ?TransactionalMetricsResponseStats $stats
     */
    #[JsonProperty('stats')]
    public ?TransactionalMetricsResponseStats $stats;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?TransactionalMetricsResponseTransactional $transactional
     */
    #[JsonProperty('transactional')]
    public ?TransactionalMetricsResponseTransactional $transactional;

    /**
     * @param array{
     *   bounceBreakdown?: ?TransactionalMetricsResponseBounceBreakdown,
     *   clickedLinks?: ?array<TransactionalMetricsResponseClickedLinksItem>,
     *   complaints?: ?TransactionalMetricsResponseComplaints,
     *   end?: ?DateTime,
     *   engagementBreakdown?: ?TransactionalMetricsResponseEngagementBreakdown,
     *   period?: ?string,
     *   start?: ?DateTime,
     *   stats?: ?TransactionalMetricsResponseStats,
     *   success?: ?bool,
     *   transactional?: ?TransactionalMetricsResponseTransactional,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounceBreakdown = $values['bounceBreakdown'] ?? null;
        $this->clickedLinks = $values['clickedLinks'] ?? null;
        $this->complaints = $values['complaints'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->engagementBreakdown = $values['engagementBreakdown'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
