<?php

namespace Sequenzy\Media\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CompleteEmailImageUploadRequest extends JsonSerializableType
{
    /**
     * @var string $altText
     */
    #[JsonProperty('altText')]
    public string $altText;

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
     * @var ?int $height
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var string $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @param array{
     *   altText: string,
     *   contentType: string,
     *   filename: string,
     *   fileSizeBytes: int,
     *   key: string,
     *   height?: ?int,
     *   width?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->altText = $values['altText'];
        $this->contentType = $values['contentType'];
        $this->filename = $values['filename'];
        $this->fileSizeBytes = $values['fileSizeBytes'];
        $this->height = $values['height'] ?? null;
        $this->key = $values['key'];
        $this->width = $values['width'] ?? null;
    }
}
