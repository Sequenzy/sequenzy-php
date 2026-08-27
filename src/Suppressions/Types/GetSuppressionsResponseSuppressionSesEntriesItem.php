<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class GetSuppressionsResponseSuppressionSesEntriesItem extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $feedbackId
     */
    #[JsonProperty('feedbackId')]
    public ?string $feedbackId;

    /**
     * @var ?DateTime $lastUpdateTime
     */
    #[JsonProperty('lastUpdateTime'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUpdateTime;

    /**
     * @var ?string $messageId
     */
    #[JsonProperty('messageId')]
    public ?string $messageId;

    /**
     * @var ?value-of<GetSuppressionsResponseSuppressionSesEntriesItemReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @param array{
     *   email?: ?string,
     *   feedbackId?: ?string,
     *   lastUpdateTime?: ?DateTime,
     *   messageId?: ?string,
     *   reason?: ?value-of<GetSuppressionsResponseSuppressionSesEntriesItemReason>,
     *   region?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->feedbackId = $values['feedbackId'] ?? null;
        $this->lastUpdateTime = $values['lastUpdateTime'] ?? null;
        $this->messageId = $values['messageId'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->region = $values['region'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
