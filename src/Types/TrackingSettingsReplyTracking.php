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
     * @param array{
     *   forwardReplies?: ?bool,
     *   inboundEmailEnabled?: ?bool,
     *   inboundReplyDomainMode?: ?value-of<TrackingSettingsReplyTrackingInboundReplyDomainMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->forwardReplies = $values['forwardReplies'] ?? null;
        $this->inboundEmailEnabled = $values['inboundEmailEnabled'] ?? null;
        $this->inboundReplyDomainMode = $values['inboundReplyDomainMode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
