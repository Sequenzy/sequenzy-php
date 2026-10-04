<?php

namespace Sequenzy\References\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\GalleryWatchedBrand;
use Sequenzy\Core\Types\ArrayType;

class ListGalleryWatchlistResponse extends JsonSerializableType
{
    /**
     * @var ?int $limit How many watches and brand requests a company can keep together.
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<GalleryWatchedBrand> $watchlist
     */
    #[JsonProperty('watchlist'), ArrayType([GalleryWatchedBrand::class])]
    public ?array $watchlist;

    /**
     * @param array{
     *   limit?: ?int,
     *   success?: ?bool,
     *   watchlist?: ?array<GalleryWatchedBrand>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->watchlist = $values['watchlist'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
