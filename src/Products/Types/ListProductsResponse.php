<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\CommerceProduct;
use Sequenzy\Core\Types\ArrayType;

class ListProductsResponse extends JsonSerializableType
{
    /**
     * @var ?ListProductsResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?ListProductsResponsePagination $pagination;

    /**
     * @var ?array<CommerceProduct> $products
     */
    #[JsonProperty('products'), ArrayType([CommerceProduct::class])]
    public ?array $products;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   pagination?: ?ListProductsResponsePagination,
     *   products?: ?array<CommerceProduct>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pagination = $values['pagination'] ?? null;
        $this->products = $values['products'] ?? null;
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
