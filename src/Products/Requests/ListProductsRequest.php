<?php

namespace Sequenzy\Products\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Products\Types\ListProductsRequestProvider;

class ListProductsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of products to return
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of products to skip
     */
    public ?int $offset;

    /**
     * @var ?value-of<ListProductsRequestProvider> $provider Filter products by source provider
     */
    public ?string $provider;

    /**
     * @var ?string $search Filter products by title
     */
    public ?string $search;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   provider?: ?value-of<ListProductsRequestProvider>,
     *   search?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->search = $values['search'] ?? null;
    }
}
