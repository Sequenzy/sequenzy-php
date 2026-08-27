<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Company-level sending state, the sender-health measurements behind it, and the remediation path. Enforcement is not time-windowed, so metricsWindow.expiresAt is always null.
 */
class SendingStatus extends JsonSerializableType
{
    /**
     * @var ?SendingStatusMetricsWindow $metricsWindow
     */
    #[JsonProperty('metricsWindow')]
    public ?SendingStatusMetricsWindow $metricsWindow;

    /**
     * @var ?DateTime $pausedAt
     */
    #[JsonProperty('pausedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $pausedAt;

    /**
     * @var ?string $pauseReason Enforcement message including the measured rate, the threshold it crossed, and the volume it was measured over.
     */
    #[JsonProperty('pauseReason')]
    public ?string $pauseReason;

    /**
     * @var ?value-of<SendingStatusPauseReasonKind> $pauseReasonKind Only high_hard_bounce_rate can be cleared through the resume endpoint.
     */
    #[JsonProperty('pauseReasonKind')]
    public ?string $pauseReasonKind;

    /**
     * @var ?SendingStatusRemediation $remediation
     */
    #[JsonProperty('remediation')]
    public ?SendingStatusRemediation $remediation;

    /**
     * @var ?SendingStatusSelfResume $selfResume
     */
    #[JsonProperty('selfResume')]
    public ?SendingStatusSelfResume $selfResume;

    /**
     * @var ?SendingStatusSenderHealth $senderHealth Null when the workspace has no metrics record yet or sender-health analytics are temporarily unavailable. Pause state and remediation remain available during an analytics outage.
     */
    #[JsonProperty('senderHealth')]
    public ?SendingStatusSenderHealth $senderHealth;

    /**
     * @var ?value-of<SendingStatusStatus> $status Anything other than active blocks every send for this workspace, including test sends.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   metricsWindow?: ?SendingStatusMetricsWindow,
     *   pausedAt?: ?DateTime,
     *   pauseReason?: ?string,
     *   pauseReasonKind?: ?value-of<SendingStatusPauseReasonKind>,
     *   remediation?: ?SendingStatusRemediation,
     *   selfResume?: ?SendingStatusSelfResume,
     *   senderHealth?: ?SendingStatusSenderHealth,
     *   status?: ?value-of<SendingStatusStatus>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->metricsWindow = $values['metricsWindow'] ?? null;
        $this->pausedAt = $values['pausedAt'] ?? null;
        $this->pauseReason = $values['pauseReason'] ?? null;
        $this->pauseReasonKind = $values['pauseReasonKind'] ?? null;
        $this->remediation = $values['remediation'] ?? null;
        $this->selfResume = $values['selfResume'] ?? null;
        $this->senderHealth = $values['senderHealth'] ?? null;
        $this->status = $values['status'] ?? null;
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
