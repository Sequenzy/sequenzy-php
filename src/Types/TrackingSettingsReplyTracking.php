<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TrackingSettingsReplyTracking extends JsonSerializableType
{
    /**
     * @var ?bool $forwardReplies
     */
    #[JsonProperty('forwardReplies')]
    public ?bool $forwardReplies;

    /**
     * @var ?bool $inboundEmailEnabled
     */
    #[JsonProperty('inboundEmailEnabled')]
    public ?bool $inboundEmailEnabled;

    /**
     * @var ?value-of<TrackingSettingsReplyTrackingInboundReplyDomainMode> $inboundReplyDomainMode Where reply addresses in your emails point. custom uses your verified receiving domain for emails from every sending domain, and inbound.sequenzy.com until one is verified; sequenzy always uses inbound.sequenzy.com. Adding your first receiving domain sets it to custom.
     */
    #[JsonProperty('inboundReplyDomainMode')]
    public ?string $inboundReplyDomainMode;

    /**
     * @var ?bool $transactionalReplyTrackingEnabled Reply tracking default for sends through the Send Email API. Account-wide reply tracking must also be enabled; per-send trackingSettings can only opt out.
     */
    #[JsonProperty('transactionalReplyTrackingEnabled')]
    public ?bool $transactionalReplyTrackingEnabled;

    /**
     * @param array{
     *   forwardReplies?: ?bool,
     *   inboundEmailEnabled?: ?bool,
     *   inboundReplyDomainMode?: ?value-of<TrackingSettingsReplyTrackingInboundReplyDomainMode>,
     *   transactionalReplyTrackingEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->forwardReplies = $values['forwardReplies'] ?? null;
        $this->inboundEmailEnabled = $values['inboundEmailEnabled'] ?? null;
        $this->inboundReplyDomainMode = $values['inboundReplyDomainMode'] ?? null;
        $this->transactionalReplyTrackingEnabled = $values['transactionalReplyTrackingEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
