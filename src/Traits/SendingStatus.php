<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\SendingStatusMetricsWindow;
use DateTime;
use Sequenzy\Types\SendingStatusPauseReasonKind;
use Sequenzy\Types\SendingStatusRemediation;
use Sequenzy\Types\SendingStatusSelfResume;
use Sequenzy\Types\SendingStatusSenderHealth;
use Sequenzy\Types\SendingStatusStatus;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

/**
 * Company-level sending state, the sender-health measurements behind it, and the remediation path. Enforcement is not time-windowed, so metricsWindow.expiresAt is always null.
 *
 * @property ?SendingStatusMetricsWindow $metricsWindow
 * @property ?DateTime $pausedAt
 * @property ?string $pauseReason
 * @property ?value-of<SendingStatusPauseReasonKind> $pauseReasonKind
 * @property ?SendingStatusRemediation $remediation
 * @property ?SendingStatusSelfResume $selfResume
 * @property ?SendingStatusSenderHealth $senderHealth
 * @property ?value-of<SendingStatusStatus> $status
 * @property ?bool $success
 */
trait SendingStatus
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
}
