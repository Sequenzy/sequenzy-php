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
     * @var ?string $inboundReplyDomainMode
     */
    #[JsonProperty('inboundReplyDomainMode')]
    public ?string $inboundReplyDomainMode;

    /**
     * @param array{
     *   forwardReplies?: ?bool,
     *   inboundEmailEnabled?: ?bool,
     *   inboundReplyDomainMode?: ?string,
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
