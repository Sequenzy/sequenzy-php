<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Per-send tracking opt-outs. Omitted fields follow the company Transactional API open, click, and reply tracking defaults. Set false to disable tracking for this send. Neither true nor omission can enable tracking disabled by account-wide or Transactional API settings.
 */
class SendTransactionalRequestTrackingSettings extends JsonSerializableType
{
    /**
     * @var ?bool $clickTracking Set `false` to skip link rewriting so the original URLs are delivered unchanged. Useful when the click-tracking redirect domain breaks iOS/Android universal links or deep links in transactional emails.
     */
    #[JsonProperty('clickTracking')]
    public ?bool $clickTracking;

    /**
     * @var ?bool $openTracking Set `false` to skip the open-tracking pixel for this send only.
     */
    #[JsonProperty('openTracking')]
    public ?bool $openTracking;

    /**
     * @var ?bool $replyTracking Set `false` to skip Reply-To rewriting for this send only, so replies go directly to the original Reply-To address instead of Sequenzy Inbox.
     */
    #[JsonProperty('replyTracking')]
    public ?bool $replyTracking;

    /**
     * @param array{
     *   clickTracking?: ?bool,
     *   openTracking?: ?bool,
     *   replyTracking?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickTracking = $values['clickTracking'] ?? null;
        $this->openTracking = $values['openTracking'] ?? null;
        $this->replyTracking = $values['replyTracking'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
