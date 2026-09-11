<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewCartItemsResponsePriceCandidatesItem extends JsonSerializableType
{
    /**
     * @var string $example
     */
    #[JsonProperty('example')]
    public string $example;

    /**
     * @var string $path
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @var value-of<PreviewCartItemsResponsePriceCandidatesItemUnits> $units
     */
    #[JsonProperty('units')]
    public string $units;

    /**
     * @param array{
     *   example: string,
     *   path: string,
     *   units: value-of<PreviewCartItemsResponsePriceCandidatesItemUnits>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->example = $values['example'];
        $this->path = $values['path'];
        $this->units = $values['units'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
