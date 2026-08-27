<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Distributable file delivered after a purchase of this product.
 */
class ProductDigitalDelivery extends JsonSerializableType
{
    /**
     * @var ?string $fileName
     */
    #[JsonProperty('fileName')]
    public ?string $fileName;

    /**
     * @var ?int $fileSizeBytes
     */
    #[JsonProperty('fileSizeBytes')]
    public ?int $fileSizeBytes;

    /**
     * @var ?string $mimeType
     */
    #[JsonProperty('mimeType')]
    public ?string $mimeType;

    /**
     * @var ?value-of<ProductDigitalDeliverySource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   fileName?: ?string,
     *   fileSizeBytes?: ?int,
     *   mimeType?: ?string,
     *   source?: ?value-of<ProductDigitalDeliverySource>,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fileName = $values['fileName'] ?? null;
        $this->fileSizeBytes = $values['fileSizeBytes'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
