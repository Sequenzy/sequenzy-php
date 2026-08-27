<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Product;
use Sequenzy\Core\Json\JsonProperty;

class AttachDeliveryProductsResponse extends JsonSerializableType
{
    /**
     * @var ?Product $product
     */
    #[JsonProperty('product')]
    public ?Product $product;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   product?: ?Product,
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
