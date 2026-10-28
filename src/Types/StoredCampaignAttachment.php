<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * A campaign attachment as stored. Uploaded Base64 content is returned as the URL Sequenzy stores it under.
 */
class StoredCampaignAttachment extends JsonSerializableType
{
    /**
     * @var string $filename
     */
    #[JsonProperty('filename')]
    public string $filename;

    /**
     * @var string $path
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
