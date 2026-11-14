<?php

namespace Sequenzy\Companies\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UploadFounderPhotoCompaniesRequest extends JsonSerializableType
{
    /**
     * @var string $imageBase64 The photo as raw base64 bytes or a base64 data URL. PNG, JPEG, GIF or WebP, up to 10MB, at least 96px on each side.
     */
    #[JsonProperty('imageBase64')]
    public string $imageBase64;

    /**
     * @param array{
     *   imageBase64: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->imageBase64 = $values['imageBase64'];
    }
}
