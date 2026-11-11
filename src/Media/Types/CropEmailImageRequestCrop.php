<?php

namespace Sequenzy\Media\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Area to keep, as fractions of the upright (EXIF-oriented) image. Must stay inside the image. Mutually exclusive with aspectRatio.
 */
class CropEmailImageRequestCrop extends JsonSerializableType
{
    /**
     * @var float $height
     */
    #[JsonProperty('height')]
    public float $height;

    /**
     * @var float $width
     */
    #[JsonProperty('width')]
    public float $width;

    /**
     * @var float $x
     */
    #[JsonProperty('x')]
    public float $x;

    /**
     * @var float $y
     */
    #[JsonProperty('y')]
    public float $y;

    /**
     * @param array{
     *   height: float,
     *   width: float,
     *   x: float,
     *   y: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->height = $values['height'];
        $this->width = $values['width'];
        $this->x = $values['x'];
        $this->y = $values['y'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
