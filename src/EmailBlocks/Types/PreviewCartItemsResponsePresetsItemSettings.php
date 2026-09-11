<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewCartItemsResponsePresetsItemSettings extends JsonSerializableType
{
    /**
     * @var ?int $fontSize
     */
    #[JsonProperty('fontSize')]
    public ?int $fontSize;

    /**
     * @var ?value-of<PreviewCartItemsResponsePresetsItemSettingsImageFit> $imageFit
     */
    #[JsonProperty('imageFit')]
    public ?string $imageFit;

    /**
     * @var ?int $imageSize
     */
    #[JsonProperty('imageSize')]
    public ?int $imageSize;

    /**
     * @var ?int $rowSpacing
     */
    #[JsonProperty('rowSpacing')]
    public ?int $rowSpacing;

    /**
     * @param array{
     *   fontSize?: ?int,
     *   imageFit?: ?value-of<PreviewCartItemsResponsePresetsItemSettingsImageFit>,
     *   imageSize?: ?int,
     *   rowSpacing?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fontSize = $values['fontSize'] ?? null;
        $this->imageFit = $values['imageFit'] ?? null;
        $this->imageSize = $values['imageSize'] ?? null;
        $this->rowSpacing = $values['rowSpacing'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
