<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Optional local-time sending window applied to every email step in a sequence. Email steps that become due outside the window wait until the next allowed local time.
 */
class SequenceSendingWindow extends JsonSerializableType
{
    /**
     * @var ?array<value-of<SequenceSendingWindowDaysItem>> $days Allowed local days. Omit days when creating or updating to allow every day.
     */
    #[JsonProperty('days'), ArrayType(['string'])]
    public ?array $days;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $endTime Latest local send cutoff in 24-hour HH:mm format, or 24:00 for the end-of-day boundary. Must be later than startTime.
     */
    #[JsonProperty('endTime')]
    public ?string $endTime;

    /**
     * @var ?string $startTime Earliest local send time in 24-hour HH:mm format.
     */
    #[JsonProperty('startTime')]
    public ?string $startTime;

    /**
     * @var ?string $timezone IANA timezone for the window.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   days?: ?array<value-of<SequenceSendingWindowDaysItem>>,
     *   enabled?: ?bool,
     *   endTime?: ?string,
     *   startTime?: ?string,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->days = $values['days'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
