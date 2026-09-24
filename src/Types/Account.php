<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * A B2B account (organization, workspace or team) that contacts belong to.
 */
class Account extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $attributes Account attributes, fanned out to members as `account.<name>`.
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $attributes;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $externalId Customer-owned organization ID, unique per workspace.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $lastEventAt
     */
    #[JsonProperty('lastEventAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastEventAt;

    /**
     * @var ?int $memberCount
     */
    #[JsonProperty('memberCount')]
    public ?int $memberCount;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   attributes?: ?array<string, mixed>,
     *   createdAt?: ?DateTime,
     *   domain?: ?string,
     *   externalId?: ?string,
     *   id?: ?string,
     *   lastEventAt?: ?DateTime,
     *   memberCount?: ?int,
     *   name?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attributes = $values['attributes'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastEventAt = $values['lastEventAt'] ?? null;
        $this->memberCount = $values['memberCount'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
