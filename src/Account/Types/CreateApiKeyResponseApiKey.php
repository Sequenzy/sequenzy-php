<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class CreateApiKeyResponseApiKey extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $key Plain API key. This is shown only on creation.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?CreateApiKeyResponseApiKeyPermissions $permissions Effective permission receipt for the newly created key. Only scopes set to null grant current and future full access.
     */
    #[JsonProperty('permissions')]
    public ?CreateApiKeyResponseApiKeyPermissions $permissions;

    /**
     * @var ?string $prefix
     */
    #[JsonProperty('prefix')]
    public ?string $prefix;

    /**
     * @var ?array<string> $scopes Explicit permission scopes, or null for full access.
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public ?array $scopes;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   id?: ?string,
     *   key?: ?string,
     *   name?: ?string,
     *   permissions?: ?CreateApiKeyResponseApiKeyPermissions,
     *   prefix?: ?string,
     *   scopes?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->permissions = $values['permissions'] ?? null;
        $this->prefix = $values['prefix'] ?? null;
        $this->scopes = $values['scopes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
