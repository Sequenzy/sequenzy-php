<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CommerceProduct;
use Sequenzy\Core\Json\JsonProperty;

class GetProductsResponse extends JsonSerializableType
{
    /**
     * @var ?CommerceProduct $product
     */
    #[JsonProperty('product')]
    public ?CommerceProduct $product;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   product?: ?CommerceProduct,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->product = $values['product'] ?? null;
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
