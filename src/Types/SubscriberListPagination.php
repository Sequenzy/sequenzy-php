<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Pagination for the subscriber list endpoint. `total` and `totalPages` are null on cursor requests because the count query is skipped.
 */
class SubscriberListPagination extends JsonSerializableType
{
    /**
     * @var ?bool $hasMore
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?string $nextCursor Pass back as `cursor` to fetch the next page. Null when there are no further results.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ?string $orderBy Sort key the cursor walks.
     */
    #[JsonProperty('orderBy')]
    public ?string $orderBy;

    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $totalPages
     */
    #[JsonProperty('totalPages')]
    public ?int $totalPages;

    /**
     * @param array{
     *   hasMore?: ?bool,
     *   limit?: ?int,
     *   nextCursor?: ?string,
     *   orderBy?: ?string,
     *   page?: ?int,
     *   total?: ?int,
     *   totalPages?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->hasMore = $values['hasMore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->orderBy = $values['orderBy'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->totalPages = $values['totalPages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
