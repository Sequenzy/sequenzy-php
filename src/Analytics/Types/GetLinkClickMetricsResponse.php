<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LinkClickBreakdown;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Types\LinkClickBreakdownLinksItem;

class GetLinkClickMetricsResponse extends JsonSerializableType
{
    use LinkClickBreakdown;

    /**
     * @var ?value-of<GetLinkClickMetricsResponseEmailType> $emailType
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var ?DateTime $end
     */
    #[JsonProperty('end'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $end;

    /**
     * @var ?string $mailboxProvider Echoed back when `mailboxProvider` is provided.
     */
    #[JsonProperty('mailboxProvider')]
    public ?string $mailboxProvider;

    /**
     * @var string $period Applied period, or `custom` when start/end were provided.
     */
    #[JsonProperty('period')]
    public string $period;

    /**
     * @var ?DateTime $start
     */
    #[JsonProperty('start'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $start;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   links: array<LinkClickBreakdownLinksItem>,
     *   totalClicks: int,
     *   totalLinks: int,
     *   totalUniqueClicks: int,
     *   period: string,
     *   success: bool,
     *   emailType?: ?value-of<GetLinkClickMetricsResponseEmailType>,
     *   end?: ?DateTime,
     *   mailboxProvider?: ?string,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->links = $values['links'];
        $this->totalClicks = $values['totalClicks'];
        $this->totalLinks = $values['totalLinks'];
        $this->totalUniqueClicks = $values['totalUniqueClicks'];
        $this->emailType = $values['emailType'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'];
        $this->start = $values['start'] ?? null;
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
