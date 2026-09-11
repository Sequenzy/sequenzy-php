<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewCartItemsResponseSuggestionsItem extends JsonSerializableType
{
    /**
     * @var string $example
     */
    #[JsonProperty('example')]
    public string $example;

    /**
     * @var string $field
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var string $path
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @param array{
     *   example: string,
     *   field: string,
     *   path: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->example = $values['example'];
        $this->field = $values['field'];
        $this->path = $values['path'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
