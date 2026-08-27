<?php

namespace Sequenzy\Media\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class CompleteEmailImageUploadResponseAsset extends JsonSerializableType
{
    /**
     * @var ?string $altText
     */
    #[JsonProperty('altText')]
    public ?string $altText;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $filename
     */
    #[JsonProperty('filename')]
    public ?string $filename;

    /**
     * @var ?string $height
     */
    #[JsonProperty('height')]
    public ?string $height;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $mimeType
     */
    #[JsonProperty('mimeType')]
    public ?string $mimeType;

    /**
     * @var ?string $size
     */
    #[JsonProperty('size')]
    public ?string $size;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $width
     */
    #[JsonProperty('width')]
    public ?string $width;

    /**
     * @param array{
     *   altText?: ?string,
     *   companyId?: ?string,
     *   createdAt?: ?DateTime,
     *   filename?: ?string,
     *   height?: ?string,
     *   id?: ?string,
     *   mimeType?: ?string,
     *   size?: ?string,
     *   url?: ?string,
     *   width?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->altText = $values['altText'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->filename = $values['filename'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->width = $values['width'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
