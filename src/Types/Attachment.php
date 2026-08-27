<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class Attachment extends JsonSerializableType
{
    /**
     * @var ?string $content Base64-encoded file content (mutually exclusive with path)
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?string $contentId Content-ID that embeds the file as an inline image instead of attaching it. Reference it from the HTML body as `<img src="cid:VALUE">`; the message is then sent as multipart/related, which is the only embedded-image form Gmail renders. If nothing in the HTML references the value, the file is sent as a normal attachment.
     */
    #[JsonProperty('contentId')]
    public ?string $contentId;

    /**
     * @var ?string $contentType MIME type of the attachment (optional, auto-detected from the filename if not provided)
     */
    #[JsonProperty('contentType')]
    public ?string $contentType;

    /**
     * @var string $filename The filename for the attachment (including extension)
     */
    #[JsonProperty('filename')]
    public string $filename;

    /**
     * @var ?string $path URL to fetch the file from (mutually exclusive with content)
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   filename: string,
     *   content?: ?string,
     *   contentId?: ?string,
     *   contentType?: ?string,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'] ?? null;
        $this->contentId = $values['contentId'] ?? null;
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
