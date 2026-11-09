<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\InAppPlacementInput;
use Sequenzy\Core\Json\JsonProperty;

class CreateInAppPlacementRequest extends JsonSerializableType
{
    use InAppPlacementInput;

    /**
     * @var string $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @param array{
     *   key: string,
     *   description?: ?string,
     *   height?: ?int,
     *   name?: ?string,
     *   width?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->description = $values['description'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->width = $values['width'] ?? null;
    }
}
