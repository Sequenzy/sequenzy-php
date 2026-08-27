<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ListProductsResponsePagination extends JsonSerializableType
{
    /**
     * @var ?int $count Number of products in this page
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?bool $hasMore Whether more products remain. Page until this is false.
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?int $offset
     */
    #[JsonProperty('offset')]
    public ?int $offset;

    /**
     * @var ?int $total Total products matching the filters across the whole catalog
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   count?: ?int,
     *   hasMore?: ?bool,
     *   limit?: ?int,
     *   offset?: ?int,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
