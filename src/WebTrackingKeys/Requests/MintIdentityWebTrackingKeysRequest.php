<?php

namespace Sequenzy\WebTrackingKeys\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class MintIdentityWebTrackingKeysRequest extends JsonSerializableType
{
    /**
     * @var ?string $email Email of the signed-in user, normalized to lowercase. Optional when externalId is provided.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId Your own ID for the signed-in user, for users without an email (Sign in with Apple relay, phone login). Case-sensitive; surrounding whitespace is trimmed.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $keyId Internal web tracking key ID. Provide this or publicKey.
     */
    #[JsonProperty('keyId')]
    public ?string $keyId;

    /**
     * @var ?string $publicKey Publishable key value (seq_pk_...). Provide this or keyId.
     */
    #[JsonProperty('publicKey')]
    public ?string $publicKey;

    /**
     * @var ?float $ttlHours
     */
    #[JsonProperty('ttlHours')]
    public ?float $ttlHours;

    /**
     * @param array{
     *   email?: ?string,
     *   externalId?: ?string,
     *   keyId?: ?string,
     *   publicKey?: ?string,
     *   ttlHours?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->keyId = $values['keyId'] ?? null;
        $this->publicKey = $values['publicKey'] ?? null;
        $this->ttlHours = $values['ttlHours'] ?? null;
    }
}
