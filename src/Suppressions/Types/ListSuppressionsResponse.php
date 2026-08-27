<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListSuppressionsResponse extends JsonSerializableType
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
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?value-of<ListSuppressionsResponseSortBy> $sortBy The sort field actually applied.
     */
    #[JsonProperty('sortBy')]
    public ?string $sortBy;

    /**
     * @var ?value-of<ListSuppressionsResponseSortOrder> $sortOrder The sort direction actually applied.
     */
    #[JsonProperty('sortOrder')]
    public ?string $sortOrder;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<ListSuppressionsResponseSuppressionsItem> $suppressions
     */
    #[JsonProperty('suppressions'), ArrayType([ListSuppressionsResponseSuppressionsItem::class])]
    public ?array $suppressions;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   hasMore?: ?bool,
     *   limit?: ?int,
     *   page?: ?int,
     *   sortBy?: ?value-of<ListSuppressionsResponseSortBy>,
     *   sortOrder?: ?value-of<ListSuppressionsResponseSortOrder>,
     *   success?: ?bool,
     *   suppressions?: ?array<ListSuppressionsResponseSuppressionsItem>,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->hasMore = $values['hasMore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->suppressions = $values['suppressions'] ?? null;
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
