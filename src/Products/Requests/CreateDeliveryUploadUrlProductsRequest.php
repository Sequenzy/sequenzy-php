<?php

namespace Sequenzy\Products\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateDeliveryUploadUrlProductsRequest extends JsonSerializableType
{
    /**
     * @var string $contentType
     */
    #[JsonProperty('contentType')]
    public string $contentType;

    /**
     * @var string $filename
     */
    #[JsonProperty('filename')]
    public string $filename;

    /**
     * @var int $fileSizeBytes
     */
    #[JsonProperty('fileSizeBytes')]
    public int $fileSizeBytes;

    /**
     * @param array{
     *   contentType: string,
     *   filename: string,
     *   fileSizeBytes: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contentType = $values['contentType'];
        $this->filename = $values['filename'];
        $this->fileSizeBytes = $values['fileSizeBytes'];
    }
}
