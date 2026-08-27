<?php

namespace Sequenzy\Products\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Products\Types\UpsertProductsRequestProductsItem;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpsertProductsRequest extends JsonSerializableType
{
    /**
     * @var array<UpsertProductsRequestProductsItem> $products Products to create or update
     */
    #[JsonProperty('products'), ArrayType([UpsertProductsRequestProductsItem::class])]
    public array $products;

    /**
     * @param array{
     *   products: array<UpsertProductsRequestProductsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->products = $values['products'];
    }
}
