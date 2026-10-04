<?php

namespace Sequenzy\References\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\GalleryBrandRequest;
use Sequenzy\Core\Types\ArrayType;

class ListGalleryBrandRequestsResponse extends JsonSerializableType
{
    /**
     * @var ?int $limit How many requests a company can keep, declined ones included.
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?array<GalleryBrandRequest> $requests
     */
    #[JsonProperty('requests'), ArrayType([GalleryBrandRequest::class])]
    public ?array $requests;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   limit?: ?int,
     *   requests?: ?array<GalleryBrandRequest>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->requests = $values['requests'] ?? null;
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
