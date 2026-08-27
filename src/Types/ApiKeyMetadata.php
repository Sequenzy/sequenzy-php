<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * Non-secret metadata for a company-scoped API key. Plain key values and stored hashes are never returned.
 */
class ApiKeyMetadata extends JsonSerializableType
{
    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?string $deviceName
     */
    #[JsonProperty('deviceName')]
    public ?string $deviceName;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var bool $isCurrent Whether this is the credential authenticating the request.
     */
    #[JsonProperty('isCurrent')]
    public bool $isCurrent;

    /**
     * @var ?DateTime $lastUsedAt
     */
    #[JsonProperty('lastUsedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUsedAt;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<string, mixed> $permissions Effective permission receipt for the key.
     */
    #[JsonProperty('permissions'), ArrayType(['string' => 'mixed'])]
    public array $permissions;

    /**
     * @var string $prefix Non-secret key prefix for identifying the credential.
     */
    #[JsonProperty('prefix')]
    public string $prefix;

    /**
     * @var ?array<string> $scopes Explicit permission scopes, or null for full access.
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public ?array $scopes;

    /**
     * @var value-of<ApiKeyMetadataType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   createdAt: DateTime,
     *   id: string,
     *   isCurrent: bool,
     *   name: string,
     *   permissions: array<string, mixed>,
     *   prefix: string,
     *   type: value-of<ApiKeyMetadataType>,
     *   updatedAt: DateTime,
     *   deviceName?: ?string,
     *   lastUsedAt?: ?DateTime,
     *   scopes?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->createdAt = $values['createdAt'];
        $this->deviceName = $values['deviceName'] ?? null;
        $this->id = $values['id'];
        $this->isCurrent = $values['isCurrent'];
        $this->lastUsedAt = $values['lastUsedAt'] ?? null;
        $this->name = $values['name'];
        $this->permissions = $values['permissions'];
        $this->prefix = $values['prefix'];
        $this->scopes = $values['scopes'] ?? null;
        $this->type = $values['type'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
