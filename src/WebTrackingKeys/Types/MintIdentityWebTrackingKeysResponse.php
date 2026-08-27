<?php

namespace Sequenzy\WebTrackingKeys\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class MintIdentityWebTrackingKeysResponse extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?string $identityToken
     */
    #[JsonProperty('identityToken')]
    public ?string $identityToken;

    /**
     * @var ?string $keyId
     */
    #[JsonProperty('keyId')]
    public ?string $keyId;

    /**
     * @var ?string $publicKey
     */
    #[JsonProperty('publicKey')]
    public ?string $publicKey;

    /**
     * @var ?string $subscriberId Contact the minted identity resolves to; created on first mint for a new email.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   email?: ?string,
     *   expiresAt?: ?DateTime,
     *   identityToken?: ?string,
     *   keyId?: ?string,
     *   publicKey?: ?string,
     *   subscriberId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->identityToken = $values['identityToken'] ?? null;
        $this->keyId = $values['keyId'] ?? null;
        $this->publicKey = $values['publicKey'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
