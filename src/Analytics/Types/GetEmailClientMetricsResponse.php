<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailClientBreakdown;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Types\EmailClientBreakdownClientsItem;
use Sequenzy\Types\EmailClientBreakdownDevicesItem;

class GetEmailClientMetricsResponse extends JsonSerializableType
{
    use EmailClientBreakdown;

    /**
     * @var ?value-of<GetEmailClientMetricsResponseEmailType> $emailType
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
     *   clients: array<EmailClientBreakdownClientsItem>,
     *   devices: array<EmailClientBreakdownDevicesItem>,
     *   privacyProxyOpens: int,
     *   totalOpens: int,
     *   period: string,
     *   success: bool,
     *   emailType?: ?value-of<GetEmailClientMetricsResponseEmailType>,
     *   end?: ?DateTime,
     *   mailboxProvider?: ?string,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clients = $values['clients'];
        $this->devices = $values['devices'];
        $this->privacyProxyOpens = $values['privacyProxyOpens'];
        $this->totalOpens = $values['totalOpens'];
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
