<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class TransactionalEmail extends JsonSerializableType
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

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   enabled?: ?bool,
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   slug?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
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
