<?php

namespace Sequenzy\Traits;

use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property ?DateTime $createdAt
 * @property ?string $emailId
 * @property ?bool $enabled
 * @property ?string $id
 * @property ?array<string> $labels
 * @property ?string $name
 * @property ?string $slug
 * @property ?DateTime $updatedAt
 */
trait TransactionalEmail
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string> $labels Assigned company label names. Empty when unlabelled.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;
}
