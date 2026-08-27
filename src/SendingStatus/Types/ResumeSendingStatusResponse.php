<?php

namespace Sequenzy\SendingStatus\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SendingStatus;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SendingStatusMetricsWindow;
use DateTime;
use Sequenzy\Types\SendingStatusPauseReasonKind;
use Sequenzy\Types\SendingStatusRemediation;
use Sequenzy\Types\SendingStatusSelfResume;
use Sequenzy\Types\SendingStatusSenderHealth;
use Sequenzy\Types\SendingStatusStatus;

class ResumeSendingStatusResponse extends JsonSerializableType
{
    use SendingStatus;

    /**
     * @var ?string $message Confirms the outcome, or explains that sending resumed while some parked work still needs support.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $resumed False when sending was already active.
     */
    #[JsonProperty('resumed')]
    public ?bool $resumed;

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
     *   message?: ?string,
     *   resumed?: ?bool,
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
        $this->message = $values['message'] ?? null;
        $this->resumed = $values['resumed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
