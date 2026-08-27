<?php

namespace Sequenzy\Media\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CompleteEmailImageUploadResponse extends JsonSerializableType
{
    /**
     * @var ?CompleteEmailImageUploadResponseAsset $asset
     */
    #[JsonProperty('asset')]
    public ?CompleteEmailImageUploadResponseAsset $asset;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   asset?: ?CompleteEmailImageUploadResponseAsset,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->asset = $values['asset'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
