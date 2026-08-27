<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Customer-facing sending readiness. When readyToSend is false, reason says why; dns_* reasons describe your DNS records, while activation reasons resolve on Sequenzy's side.
 */
class WebsiteReadiness extends JsonSerializableType
{
    /**
     * @var ?value-of<WebsiteReadinessReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<WebsiteReadinessStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   reason?: ?value-of<WebsiteReadinessReason>,
     *   status?: ?value-of<WebsiteReadinessStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->reason = $values['reason'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
