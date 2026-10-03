<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ConversationAttachment extends JsonSerializableType
{
    /**
     * @var string $contentType
     */
    #[JsonProperty('contentType')]
    public string $contentType;

    /**
     * @var ?string $downloadUrl Signed download link valid for one hour, returned by Get Conversation for stored files. Null when the file was not stored (for example, attachment storage is not configured, the file was flagged by the virus scan, or its retention period ended).
     */
    #[JsonProperty('downloadUrl')]
    public ?string $downloadUrl;

    /**
     * @var string $filename
     */
    #[JsonProperty('filename')]
    public string $filename;

    /**
     * @var ?string $s3Key Internal storage key. Present only when the file is stored.
     */
    #[JsonProperty('s3Key')]
    public ?string $s3Key;

    /**
     * @var int $size Size in bytes.
     */
    #[JsonProperty('size')]
    public int $size;

    /**
     * @param array{
     *   contentType: string,
     *   filename: string,
     *   size: int,
     *   downloadUrl?: ?string,
     *   s3Key?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contentType = $values['contentType'];
        $this->downloadUrl = $values['downloadUrl'] ?? null;
        $this->filename = $values['filename'];
        $this->s3Key = $values['s3Key'] ?? null;
        $this->size = $values['size'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
