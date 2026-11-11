<?php

namespace Sequenzy\Media\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CropEmailImageResponse extends JsonSerializableType
{
    /**
     * @var ?CropEmailImageResponseAsset $asset The new media-library asset holding the cropped image.
     */
    #[JsonProperty('asset')]
    public ?CropEmailImageResponseAsset $asset;

    /**
     * @var ?CropEmailImageResponseCrop $crop Crop record to store on the image block next to src, so the editor can re-open or undo the crop. x, y, width and height are snapped to whole source pixels.
     */
    #[JsonProperty('crop')]
    public ?CropEmailImageResponseCrop $crop;

    /**
     * @var ?int $sourceHeight Upright height of the original in pixels.
     */
    #[JsonProperty('sourceHeight')]
    public ?int $sourceHeight;

    /**
     * @var ?int $sourceWidth Upright width of the original in pixels.
     */
    #[JsonProperty('sourceWidth')]
    public ?int $sourceWidth;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   asset?: ?CropEmailImageResponseAsset,
     *   crop?: ?CropEmailImageResponseCrop,
     *   sourceHeight?: ?int,
     *   sourceWidth?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->asset = $values['asset'] ?? null;
        $this->crop = $values['crop'] ?? null;
        $this->sourceHeight = $values['sourceHeight'] ?? null;
        $this->sourceWidth = $values['sourceWidth'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
