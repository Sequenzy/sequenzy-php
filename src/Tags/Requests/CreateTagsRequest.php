<?php

namespace Sequenzy\Tags\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateTagsRequest extends JsonSerializableType
{
    /**
     * @var ?string $color Tag color. One of: gray, red, orange, amber, yellow, lime, green, emerald, teal, cyan, sky, blue, indigo, violet, purple, fuchsia, pink, rose. Defaults to gray.
     */
    #[JsonProperty('color')]
    public ?string $color;

    /**
     * @var string $name Tag name. Normalized to lowercase with spaces replaced by hyphens.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     *   color?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->color = $values['color'] ?? null;
        $this->name = $values['name'];
    }
}
