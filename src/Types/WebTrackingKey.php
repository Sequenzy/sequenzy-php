<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * A publishable key for the browser tracking SDK. The key ships in the customer's page source by design, so it is not a secret; it authorizes storefront customer events only and carries an origin allowlist instead of scopes.
 */
class WebTrackingKey extends JsonSerializableType
{
    /**
     * @var ?array<string> $allowedOrigins Normalized origins allowed to use this key. Empty means any origin.
     */
    #[JsonProperty('allowedOrigins'), ArrayType(['string'])]
    public ?array $allowedOrigins;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $endpoint Ingest URL the SDK posts events to.
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $installSnippet The exact script tag to paste into every page. Embeds both the key and the workspace id.
     */
    #[JsonProperty('installSnippet')]
    public ?string $installSnippet;

    /**
     * @var ?bool $isActive False when revoked. Revoked keys are rejected at ingest.
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?DateTime $lastUsedAt When the key last authorized an event, or null if it never has. Updated at most every five minutes.
     */
    #[JsonProperty('lastUsedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUsedAt;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $publicKey The publishable key, prefixed seq_pk_.
     */
    #[JsonProperty('publicKey')]
    public ?string $publicKey;

    /**
     * @var ?bool $unrestricted True when the allowlist is empty, so any site can send events with this key.
     */
    #[JsonProperty('unrestricted')]
    public ?bool $unrestricted;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $warning Present only when the key is unrestricted.
     */
    #[JsonProperty('warning')]
    public ?string $warning;

    /**
     * @param array{
     *   allowedOrigins?: ?array<string>,
     *   createdAt?: ?DateTime,
     *   endpoint?: ?string,
     *   id?: ?string,
     *   installSnippet?: ?string,
     *   isActive?: ?bool,
     *   lastUsedAt?: ?DateTime,
     *   name?: ?string,
     *   publicKey?: ?string,
     *   unrestricted?: ?bool,
     *   updatedAt?: ?DateTime,
     *   warning?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowedOrigins = $values['allowedOrigins'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->installSnippet = $values['installSnippet'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->lastUsedAt = $values['lastUsedAt'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publicKey = $values['publicKey'] ?? null;
        $this->unrestricted = $values['unrestricted'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->warning = $values['warning'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
