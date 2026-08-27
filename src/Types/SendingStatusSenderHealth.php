<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Null when the workspace has no metrics record yet or sender-health analytics are temporarily unavailable. Pause state and remediation remain available during an analytics outage.
 */
class SendingStatusSenderHealth extends JsonSerializableType
{
    /**
     * @var ?int $bounceScopedSent Non-test sends counted from the bounce reset watermark - the denominator for hard- and soft-bounce rates.
     */
    #[JsonProperty('bounceScopedSent')]
    public ?int $bounceScopedSent;

    /**
     * @var ?SenderHealthMetric $complaint
     */
    #[JsonProperty('complaint')]
    public ?SenderHealthMetric $complaint;

    /**
     * @var ?int $complaintScopedSent Non-test sends counted from the complaint reset watermark - the denominator for complaint rates.
     */
    #[JsonProperty('complaintScopedSent')]
    public ?int $complaintScopedSent;

    /**
     * @var ?value-of<SendingStatusSenderHealthEnforcementMode> $enforcementMode
     */
    #[JsonProperty('enforcementMode')]
    public ?string $enforcementMode;

    /**
     * @var ?SenderHealthMetric $hardBounce
     */
    #[JsonProperty('hardBounce')]
    public ?SenderHealthMetric $hardBounce;

    /**
     * @var ?int $scopedSent Backward-compatible alias for bounceScopedSent.
     */
    #[JsonProperty('scopedSent')]
    public ?int $scopedSent;

    /**
     * @var ?SenderHealthMetric $softBounce
     */
    #[JsonProperty('softBounce')]
    public ?SenderHealthMetric $softBounce;

    /**
     * @param array{
     *   bounceScopedSent?: ?int,
     *   complaint?: ?SenderHealthMetric,
     *   complaintScopedSent?: ?int,
     *   enforcementMode?: ?value-of<SendingStatusSenderHealthEnforcementMode>,
     *   hardBounce?: ?SenderHealthMetric,
     *   scopedSent?: ?int,
     *   softBounce?: ?SenderHealthMetric,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounceScopedSent = $values['bounceScopedSent'] ?? null;
        $this->complaint = $values['complaint'] ?? null;
        $this->complaintScopedSent = $values['complaintScopedSent'] ?? null;
        $this->enforcementMode = $values['enforcementMode'] ?? null;
        $this->hardBounce = $values['hardBounce'] ?? null;
        $this->scopedSent = $values['scopedSent'] ?? null;
        $this->softBounce = $values['softBounce'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
