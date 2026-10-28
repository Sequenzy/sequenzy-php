<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * A file sent with every recipient's campaign email. Provide Base64 `content` or a public `path` URL, not both. Base64 content is stored by Sequenzy and returned as a `path`. Inline images (`contentId`) are not supported on campaigns.
 */
class CampaignAttachmentInput extends JsonSerializableType
{
    /**
     * @var ?string $content Base64-encoded file content (mutually exclusive with path). Counts toward the 5MB campaign total.
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?string $contentType MIME type for Base64 content. Defaults to the type implied by the filename extension. PDF, Office documents, ZIP, image, audio, video and text files are accepted; HTML and SVG are not. Not accepted with path.
     */
    #[JsonProperty('contentType')]
    public ?string $contentType;

    /**
     * @var string $filename Filename shown in the recipient's email client, including the extension. Merge tags are not supported.
     */
    #[JsonProperty('filename')]
    public string $filename;

    /**
     * @var ?string $path Public HTTP(S) URL fetched when the campaign starts sending (mutually exclusive with content).
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   filename: string,
     *   content?: ?string,
     *   contentType?: ?string,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->filename = $values['filename'];
        $this->path = $values['path'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
