<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * URL-backed email attachment. The file is fetched from the URL at send time (max 10 attachments and 7MB total per email). For event-triggered sequences, path may be an event merge tag such as {{event.file_url}} that resolves to a public URL for each enrollment. Base64 content is not supported here.
 */
class UrlAttachment extends JsonSerializableType
{
    /**
     * @var string $filename Filename shown in the recipient's email client (including extension). Event merge tags are supported.
     */
    #[JsonProperty('filename')]
    public string $filename;

    /**
     * @var string $path Public HTTP(S) URL or an event-backed URL template such as {{event.file_url}}. The resolved URL is validated and fetched at send time.
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @param array{
     *   filename: string,
     *   path: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->filename = $values['filename'];
        $this->path = $values['path'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
