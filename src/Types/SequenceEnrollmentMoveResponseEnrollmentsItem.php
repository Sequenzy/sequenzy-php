<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentMoveResponseEnrollmentsItem extends JsonSerializableType
{
    /**
     * @var ?string $enrollmentKey
     */
    #[JsonProperty('enrollmentKey')]
    public ?string $enrollmentKey;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subscriberEmail
     */
    #[JsonProperty('subscriberEmail')]
    public ?string $subscriberEmail;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?string $tokenId
     */
    #[JsonProperty('tokenId')]
    public ?string $tokenId;

    /**
     * @param array{
     *   enrollmentKey?: ?string,
     *   status?: ?string,
     *   subscriberEmail?: ?string,
     *   subscriberId?: ?string,
     *   tokenId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enrollmentKey = $values['enrollmentKey'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberEmail = $values['subscriberEmail'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->tokenId = $values['tokenId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
