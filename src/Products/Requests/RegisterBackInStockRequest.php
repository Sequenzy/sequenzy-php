<?php

namespace Sequenzy\Products\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CommerceCustomer;
use Sequenzy\Core\Json\JsonProperty;

class RegisterBackInStockRequest extends JsonSerializableType
{
    /**
     * @var CommerceCustomer $customer
     */
    #[JsonProperty('customer')]
    public CommerceCustomer $customer;

    /**
     * @var string $productId Your product identifier
     */
    #[JsonProperty('productId')]
    public string $productId;

    /**
     * @var ?string $productTitle Product title snapshot. Defaults to the synced product title.
     */
    #[JsonProperty('productTitle')]
    public ?string $productTitle;

    /**
     * @var ?string $variantId Your variant identifier. Defaults to productId for products without variants.
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @var ?string $variantTitle Variant title snapshot. Defaults to the synced variant title.
     */
    #[JsonProperty('variantTitle')]
    public ?string $variantTitle;

    /**
     * @param array{
     *   customer: CommerceCustomer,
     *   productId: string,
     *   productTitle?: ?string,
     *   variantId?: ?string,
     *   variantTitle?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customer = $values['customer'];
        $this->productId = $values['productId'];
        $this->productTitle = $values['productTitle'] ?? null;
        $this->variantId = $values['variantId'] ?? null;
        $this->variantTitle = $values['variantTitle'] ?? null;
    }
}
