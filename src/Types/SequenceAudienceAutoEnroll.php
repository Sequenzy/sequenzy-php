<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Manual countdowns only. Keeps enrolling people who join the audience later (new list members, new segment matches) until the last key date passes; they land on the step the countdown is at. Switching on enrolls the current audience right away and re-checks every few minutes. Ends itself after the last key date. Send null to clear.
 */
class SequenceAudienceAutoEnroll extends JsonSerializableType
{
    /**
     * @var SequenceAudience $audience
     */
    #[JsonProperty('audience')]
    public SequenceAudience $audience;

    /**
     * @var ?bool $enabled Defaults to true. False keeps the audience but stops syncing.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?DateTime $enabledAt
     */
    #[JsonProperty('enabledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $enabledAt;

    /**
     * @var ?DateTime $endedAt
     */
    #[JsonProperty('endedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endedAt;

    /**
     * @var ?value-of<SequenceAudienceAutoEnrollEndedReason> $endedReason
     */
    #[JsonProperty('endedReason')]
    public ?string $endedReason;

    /**
     * @var ?DateTime $lastSyncedAt Start time of the last successfully completed sync. Failed or cancelled runs do not advance it. Incremental scans include new or updated contacts and new list memberships.
     */
    #[JsonProperty('lastSyncedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncedAt;

    /**
     * @var ?DateTime $startsAt No sync runs before this moment. Pass the scheduledFor of a scheduled initial enrollment so late joiners are not enrolled ahead of everyone else.
     */
    #[JsonProperty('startsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startsAt;

    /**
     * @param array{
     *   audience: SequenceAudience,
     *   enabled?: ?bool,
     *   enabledAt?: ?DateTime,
     *   endedAt?: ?DateTime,
     *   endedReason?: ?value-of<SequenceAudienceAutoEnrollEndedReason>,
     *   lastSyncedAt?: ?DateTime,
     *   startsAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'];
        $this->enabled = $values['enabled'] ?? null;
        $this->enabledAt = $values['enabledAt'] ?? null;
        $this->endedAt = $values['endedAt'] ?? null;
        $this->endedReason = $values['endedReason'] ?? null;
        $this->lastSyncedAt = $values['lastSyncedAt'] ?? null;
        $this->startsAt = $values['startsAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
