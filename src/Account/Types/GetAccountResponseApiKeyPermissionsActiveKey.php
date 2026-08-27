<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Non-secret identity of the bearer key that authenticated this request. Use it to verify that a restarted client loaded the intended replacement key.
 */
class GetAccountResponseApiKeyPermissionsActiveKey extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $prefix Stored non-secret key prefix, such as seq_live_A or seq_user_B. Pair it with the key name and ID when verifying a replacement credential.
     */
    #[JsonProperty('prefix')]
    public ?string $prefix;

    /**
     * @var ?value-of<GetAccountResponseApiKeyPermissionsActiveKeyType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   prefix?: ?string,
     *   type?: ?value-of<GetAccountResponseApiKeyPermissionsActiveKeyType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->prefix = $values['prefix'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
