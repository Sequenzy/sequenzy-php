<?php

namespace Sequenzy\WebTrackingKeys\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class MintIdentityWebTrackingKeysRequest extends JsonSerializableType
{
    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

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
     *   email: string,
     *   keyId?: ?string,
     *   publicKey?: ?string,
     *   ttlHours?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->keyId = $values['keyId'] ?? null;
        $this->publicKey = $values['publicKey'] ?? null;
        $this->ttlHours = $values['ttlHours'] ?? null;
    }
}
