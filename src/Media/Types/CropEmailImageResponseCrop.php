<?php

namespace Sequenzy\Media\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Crop record to store on the image block next to src, so the editor can re-open or undo the crop. x, y, width and height are snapped to whole source pixels.
 */
class CropEmailImageResponseCrop extends JsonSerializableType
{
    /**
     * @var ?string $croppedSrc
     */
    #[JsonProperty('croppedSrc')]
    public ?string $croppedSrc;

    /**
     * @var ?float $height
     */
    #[JsonProperty('height')]
    public ?float $height;

    /**
     * @var ?string $sourceSrc
     */
    #[JsonProperty('sourceSrc')]
    public ?string $sourceSrc;

    /**
     * @var ?float $width
     */
    #[JsonProperty('width')]
    public ?float $width;

    /**
     * @var ?float $x
     */
    #[JsonProperty('x')]
    public ?float $x;

    /**
     * @var ?float $y
     */
    #[JsonProperty('y')]
    public ?float $y;

    /**
     * @param array{
     *   croppedSrc?: ?string,
     *   height?: ?float,
     *   sourceSrc?: ?string,
     *   width?: ?float,
     *   x?: ?float,
     *   y?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->croppedSrc = $values['croppedSrc'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->sourceSrc = $values['sourceSrc'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->x = $values['x'] ?? null;
        $this->y = $values['y'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
