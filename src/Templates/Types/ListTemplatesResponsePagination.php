<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ListTemplatesResponsePagination extends JsonSerializableType
{
    /**
     * @var ?int $count Templates on this page.
     */
    #[JsonProperty('count')]
    public ?int $count;

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
     * @var ?int $offset
     */
    #[JsonProperty('offset')]
    public ?int $offset;

    /**
     * @var ?int $page 1-based page that starts at offset.
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $total Every matching email body.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $totalPages Pages at this limit.
     */
    #[JsonProperty('totalPages')]
    public ?int $totalPages;

    /**
     * @param array{
     *   count?: ?int,
     *   hasMore?: ?bool,
     *   limit?: ?int,
     *   offset?: ?int,
     *   page?: ?int,
     *   total?: ?int,
     *   totalPages?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
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
