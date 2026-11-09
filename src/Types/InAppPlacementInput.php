<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class InAppPlacementInput extends JsonSerializableType
{
    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $height
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @param array{
     *   description?: ?string,
     *   height?: ?int,
     *   name?: ?string,
     *   width?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->name = $values['name'] ?? null;
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
