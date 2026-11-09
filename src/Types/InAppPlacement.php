<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

/**
 * A slot in your app or website that shows in-app content inline.
 */
class InAppPlacement extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $description Where the slot sits in the app; empty when not set.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $height Height hint in points; null when not set.
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var ?string $key What app code passes to the SDK. 1-64 lowercase letters, numbers, dots, dashes or underscores, starting with a letter or number. Never changes.
     */
    #[JsonProperty('key')]
    public ?string $key;

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
     * @var ?int $width Width hint in points (CSS pixels on the web) for whoever writes the content; null when not set.
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   description?: ?string,
     *   height?: ?int,
     *   key?: ?string,
     *   name?: ?string,
     *   updatedAt?: ?DateTime,
     *   width?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->width = $values['width'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
