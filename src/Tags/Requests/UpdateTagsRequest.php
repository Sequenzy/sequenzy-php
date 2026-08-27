<?php

namespace Sequenzy\Tags\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateTagsRequest extends JsonSerializableType
{
    /**
     * @var string $color Tag color. One of: gray, red, orange, amber, yellow, lime, green, emerald, teal, cyan, sky, blue, indigo, violet, purple, fuchsia, pink, rose.
     */
    #[JsonProperty('color')]
    public string $color;

    /**
     * @param array{
     *   color: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->color = $values['color'];
    }
}
