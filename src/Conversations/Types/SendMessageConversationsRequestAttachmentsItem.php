<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SendMessageConversationsRequestAttachmentsItem extends JsonSerializableType
{
    /**
     * @var string $content Base64-encoded file content.
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var ?string $contentType MIME type. Inferred from the file name when omitted or invalid.
     */
    #[JsonProperty('contentType')]
    public ?string $contentType;

    /**
     * @var string $filename
     */
    #[JsonProperty('filename')]
    public string $filename;

    /**
     * @param array{
     *   content: string,
     *   filename: string,
     *   contentType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'];
        $this->contentType = $values['contentType'] ?? null;
        $this->filename = $values['filename'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
