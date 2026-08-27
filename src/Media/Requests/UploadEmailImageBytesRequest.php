<?php

namespace Sequenzy\Media\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class UploadEmailImageBytesRequest extends JsonSerializableType
{
    /**
     * @var string $contentType
     */
    public string $contentType;

    /**
     * @var string $filename
     */
    public string $filename;

    /**
     * @var int $fileSizeBytes
     */
    public int $fileSizeBytes;

    /**
     * @var string $key
     */
    public string $key;

    /**
     * @param array{
     *   contentType: string,
     *   filename: string,
     *   fileSizeBytes: int,
     *   key: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contentType = $values['contentType'];
        $this->filename = $values['filename'];
        $this->fileSizeBytes = $values['fileSizeBytes'];
        $this->key = $values['key'];
    }
}
