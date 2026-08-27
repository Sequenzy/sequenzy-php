<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class GetStatsSequencesResponseStepsItemFailedSubscribersItem extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?DateTime $failedAt
     */
    #[JsonProperty('failedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $failedAt;

    /**
     * @var ?string $failedReason
     */
    #[JsonProperty('failedReason')]
    public ?string $failedReason;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @param array{
     *   email?: ?string,
     *   failedAt?: ?DateTime,
     *   failedReason?: ?string,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->failedAt = $values['failedAt'] ?? null;
        $this->failedReason = $values['failedReason'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
