<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class GetMetricsBreakdownResponse extends JsonSerializableType
{
    /**
     * @var string $by
     */
    #[JsonProperty('by')]
    public string $by;

    /**
     * @var ?string $emailType
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var DateTime $end
     */
    #[JsonProperty('end'), Date(Date::TYPE_DATETIME)]
    public DateTime $end;

    /**
     * @var ?string $mailboxProvider
     */
    #[JsonProperty('mailboxProvider')]
    public ?string $mailboxProvider;

    /**
     * @var ?string $outcome
     */
    #[JsonProperty('outcome')]
    public ?string $outcome;

    /**
     * @var ?string $period Applied period, or `custom` when start/end were provided.
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?string $recipientDomain
     */
    #[JsonProperty('recipientDomain')]
    public ?string $recipientDomain;

    /**
     * @var array<GetMetricsBreakdownResponseRowsItem> $rows
     */
    #[JsonProperty('rows'), ArrayType([GetMetricsBreakdownResponseRowsItem::class])]
    public array $rows;

    /**
     * @var ?string $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var DateTime $start
     */
    #[JsonProperty('start'), Date(Date::TYPE_DATETIME)]
    public DateTime $start;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   by: string,
     *   end: DateTime,
     *   rows: array<GetMetricsBreakdownResponseRowsItem>,
     *   start: DateTime,
     *   success: bool,
     *   emailType?: ?string,
     *   mailboxProvider?: ?string,
     *   outcome?: ?string,
     *   period?: ?string,
     *   recipientDomain?: ?string,
     *   source?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->by = $values['by'];
        $this->emailType = $values['emailType'] ?? null;
        $this->end = $values['end'];
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->outcome = $values['outcome'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->recipientDomain = $values['recipientDomain'] ?? null;
        $this->rows = $values['rows'];
        $this->source = $values['source'] ?? null;
        $this->start = $values['start'];
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
