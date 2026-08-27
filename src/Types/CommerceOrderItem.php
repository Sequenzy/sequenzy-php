<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CommerceOrderItem extends JsonSerializableType
{
    /**
     * @var ?int $priceCents Unit price in cents
     */
    #[JsonProperty('priceCents')]
    public ?int $priceCents;

    /**
     * @var string $productId Your product identifier (same value used when upserting products)
     */
    #[JsonProperty('productId')]
    public string $productId;

    /**
     * @var int $quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var ?string $sku
     */
    #[JsonProperty('sku')]
    public ?string $sku;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $variantId Your variant identifier within the product
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @var ?string $variantTitle
     */
    #[JsonProperty('variantTitle')]
    public ?string $variantTitle;

    /**
     * @param array{
     *   productId: string,
     *   quantity: int,
     *   title: string,
     *   priceCents?: ?int,
     *   sku?: ?string,
     *   variantId?: ?string,
     *   variantTitle?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->priceCents = $values['priceCents'] ?? null;
        $this->productId = $values['productId'];
        $this->quantity = $values['quantity'];
        $this->sku = $values['sku'] ?? null;
        $this->title = $values['title'];
        $this->variantId = $values['variantId'] ?? null;
        $this->variantTitle = $values['variantTitle'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
