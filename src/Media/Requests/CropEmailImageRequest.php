<?php

namespace Sequenzy\Media\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Union;
use Sequenzy\Media\Types\CropEmailImageRequestCrop;

class CropEmailImageRequest extends JsonSerializableType
{
    /**
     * @var ?string $altText Stored on the new asset; longer text is cut at 500 characters. Defaults to the generated file name. A repeated crop keeps the first request's alt text.
     */
    #[JsonProperty('altText')]
    public ?string $altText;

    /**
     * @var (
     *    float
     *   |string
     * )|null $aspectRatio Width / height as a number or "W:H" string, between 1:10 and 10:1. Crops the largest area of that shape. Mutually exclusive with crop.
     */
    #[JsonProperty('aspectRatio'), Union('float', 'string', 'null')]
    public float|string|null $aspectRatio;

    /**
     * @var ?CropEmailImageRequestCrop $crop Area to keep, as fractions of the upright (EXIF-oriented) image. Must stay inside the image. Mutually exclusive with aspectRatio.
     */
    #[JsonProperty('crop')]
    public ?CropEmailImageRequestCrop $crop;

    /**
     * @var ?float $focusX With aspectRatio only. Horizontal center of the crop. Defaults to 0.5.
     */
    #[JsonProperty('focusX')]
    public ?float $focusX;

    /**
     * @var ?float $focusY With aspectRatio only. Vertical center of the crop. Defaults to 0.5.
     */
    #[JsonProperty('focusY')]
    public ?float $focusY;

    /**
     * @var string $sourceUrl Hosted URL of the original image: a media-library URL or a Pexels/Unsplash photo. Merge tags and other hosts are rejected.
     */
    #[JsonProperty('sourceUrl')]
    public string $sourceUrl;

    /**
     * @param array{
     *   sourceUrl: string,
     *   altText?: ?string,
     *   aspectRatio?: (
     *    float
     *   |string
     * )|null,
     *   crop?: ?CropEmailImageRequestCrop,
     *   focusX?: ?float,
     *   focusY?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->altText = $values['altText'] ?? null;
        $this->aspectRatio = $values['aspectRatio'] ?? null;
        $this->crop = $values['crop'] ?? null;
        $this->focusX = $values['focusX'] ?? null;
        $this->focusY = $values['focusY'] ?? null;
        $this->sourceUrl = $values['sourceUrl'];
    }
}
