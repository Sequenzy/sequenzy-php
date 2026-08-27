<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class EmailComponent extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?value-of<EmailComponentComponentType> $componentType
     */
    #[JsonProperty('componentType')]
    public ?string $componentType;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?value-of<EmailComponentDefaultSlot> $defaultSlot Slot this component is pinned as the company default for, or null when it is an ordinary saved component.
     */
    #[JsonProperty('defaultSlot')]
    public ?string $defaultSlot;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

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
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?int $version Incremented every time the component's blocks are replaced. Emails cloned from an earlier version keep those blocks.
     */
    #[JsonProperty('version')]
    public ?int $version;

    /**
     * @param array{
     *   blocks?: ?array<EmailBlock>,
     *   companyId?: ?string,
     *   componentType?: ?value-of<EmailComponentComponentType>,
     *   createdAt?: ?DateTime,
     *   defaultSlot?: ?value-of<EmailComponentDefaultSlot>,
     *   description?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   updatedAt?: ?DateTime,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->componentType = $values['componentType'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->defaultSlot = $values['defaultSlot'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->version = $values['version'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
