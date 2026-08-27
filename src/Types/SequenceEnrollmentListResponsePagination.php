<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentListResponsePagination extends JsonSerializableType
{
    /**
     * @var ?float $count
     */
    #[JsonProperty('count')]
    public ?float $count;

    /**
     * @var ?bool $hasMore
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?float $limit
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?float $offset
     */
    #[JsonProperty('offset')]
    public ?float $offset;

    /**
     * @var ?float $total
     */
    #[JsonProperty('total')]
    public ?float $total;

    /**
     * @param array{
     *   count?: ?float,
     *   hasMore?: ?bool,
     *   limit?: ?float,
     *   offset?: ?float,
     *   total?: ?float,
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
