<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateDeliveryUploadUrlProductsResponse extends JsonSerializableType
{
    /**
     * @var ?string $fileName
     */
    #[JsonProperty('fileName')]
    public ?string $fileName;

    /**
     * @var ?string $publicUrl
     */
    #[JsonProperty('publicUrl')]
    public ?string $publicUrl;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $uploadUrl
     */
    #[JsonProperty('uploadUrl')]
    public ?string $uploadUrl;

    /**
     * @param array{
     *   fileName?: ?string,
     *   publicUrl?: ?string,
     *   success?: ?bool,
     *   uploadUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fileName = $values['fileName'] ?? null;
        $this->publicUrl = $values['publicUrl'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->uploadUrl = $values['uploadUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
