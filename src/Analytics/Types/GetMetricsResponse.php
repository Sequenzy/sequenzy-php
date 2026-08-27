<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\CommerceValueForecast;
use Sequenzy\Types\EngagementStats;

class GetMetricsResponse extends JsonSerializableType
{
    /**
     * @var ?int $activeSubscriberCount Live count of contacts with status=active. Independent of the requested period. May include phone-only contacts without an email address.
     */
    #[JsonProperty('activeSubscriberCount')]
    public ?int $activeSubscriberCount;

    /**
     * @var ?CommerceValueForecast $commerceForecast Optional latest background-computed forecast snapshot. Omitted when emailType is filtered, no snapshot is available, or analytics storage is temporarily unavailable.
     */
    #[JsonProperty('commerceForecast')]
    public ?CommerceValueForecast $commerceForecast;

    /**
     * @var ?value-of<GetMetricsResponseEmailType> $emailType
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var ?string $mailboxProvider Echoed back when `mailboxProvider` is provided.
     */
    #[JsonProperty('mailboxProvider')]
    public ?string $mailboxProvider;

    /**
     * @var ?string $period
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?EngagementStats $stats
     */
    #[JsonProperty('stats')]
    public ?EngagementStats $stats;

    /**
     * @var ?int $subscriberCount Live count of every stored contact in the company. Independent of the requested period.
     */
    #[JsonProperty('subscriberCount')]
    public ?int $subscriberCount;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   activeSubscriberCount?: ?int,
     *   commerceForecast?: ?CommerceValueForecast,
     *   emailType?: ?value-of<GetMetricsResponseEmailType>,
     *   mailboxProvider?: ?string,
     *   period?: ?string,
     *   stats?: ?EngagementStats,
     *   subscriberCount?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeSubscriberCount = $values['activeSubscriberCount'] ?? null;
        $this->commerceForecast = $values['commerceForecast'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->subscriberCount = $values['subscriberCount'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
