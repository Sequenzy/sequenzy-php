<?php

namespace Sequenzy\Traits;

use Sequenzy\Core\Json\JsonProperty;

/**
 * @property ?string $description
 * @property ?int $height
 * @property ?string $name
 * @property ?int $width
 */
trait InAppPlacementInput
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
}
