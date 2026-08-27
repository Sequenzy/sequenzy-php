<?php

namespace Sequenzy\Products\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Products\Types\AttachDeliveryProductsRequestSource;

class AttachDeliveryProductsRequest extends JsonSerializableType
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
     * @var ?value-of<AttachDeliveryProductsRequestSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var string $url Public http(s) URL of the file.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     *   fileName?: ?string,
     *   fileSizeBytes?: ?int,
     *   mimeType?: ?string,
     *   source?: ?value-of<AttachDeliveryProductsRequestSource>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fileName = $values['fileName'] ?? null;
        $this->fileSizeBytes = $values['fileSizeBytes'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->url = $values['url'];
    }
}
