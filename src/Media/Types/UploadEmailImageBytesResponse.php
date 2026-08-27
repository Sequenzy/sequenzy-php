<?php

namespace Sequenzy\Media\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UploadEmailImageBytesResponse extends JsonSerializableType
{
    /**
     * @var ?string $key
     */
    #[JsonProperty('key')]
    public ?string $key;

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
     * @param array{
     *   key?: ?string,
     *   publicUrl?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->key = $values['key'] ?? null;
        $this->publicUrl = $values['publicUrl'] ?? null;
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
