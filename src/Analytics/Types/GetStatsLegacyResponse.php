<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CommerceValueForecast;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EngagementStats;

class GetStatsLegacyResponse extends JsonSerializableType
{
    /**
     * @var ?CommerceValueForecast $commerceForecast Optional latest background-computed forecast snapshot. Omitted when emailType is filtered, no snapshot is available, or analytics storage is temporarily unavailable.
     */
    #[JsonProperty('commerceForecast')]
    public ?CommerceValueForecast $commerceForecast;

    /**
     * @var ?value-of<GetStatsLegacyResponseEmailType> $emailType
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
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   commerceForecast?: ?CommerceValueForecast,
     *   emailType?: ?value-of<GetStatsLegacyResponseEmailType>,
     *   mailboxProvider?: ?string,
     *   period?: ?string,
     *   stats?: ?EngagementStats,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->commerceForecast = $values['commerceForecast'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->stats = $values['stats'] ?? null;
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
