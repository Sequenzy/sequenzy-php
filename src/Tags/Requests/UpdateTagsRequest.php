<?php

namespace Sequenzy\Tags\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateTagsRequest extends JsonSerializableType
{
    /**
     * @var ?string $color Tag color. One of: gray, red, orange, amber, yellow, lime, green, emerald, teal, cyan, sky, blue, indigo, violet, purple, fuchsia, pink, rose. Required unless name is sent.
     */
    #[JsonProperty('color')]
    public ?string $color;

    /**
     * @var ?string $name New tag name. Normalized to lowercase with spaces turned into hyphens. Up to 255 characters. Required unless color is sent.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   color?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->color = $values['color'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
