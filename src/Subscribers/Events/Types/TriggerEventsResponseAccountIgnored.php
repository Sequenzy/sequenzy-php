<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when the request included `account` but the workspace has not turned Accounts on, so the field was ignored. Create an account with POST /accounts or turn Accounts on in the dashboard.
 */
class TriggerEventsResponseAccountIgnored extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?value-of<TriggerEventsResponseAccountIgnoredReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   message?: ?string,
     *   reason?: ?value-of<TriggerEventsResponseAccountIgnoredReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
