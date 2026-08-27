<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CommerceProductVariantsItem extends JsonSerializableType
{
    /**
     * @var ?int $compareAtPriceCents
     */
    #[JsonProperty('compareAtPriceCents')]
    public ?int $compareAtPriceCents;

    /**
     * @var ?string $currency The variant's own currency. Stripe products can have active prices in several currencies, so this can differ from the product-level currency.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?bool $inStock
     */
    #[JsonProperty('inStock')]
    public ?bool $inStock;

    /**
     * @var ?int $inventoryQuantity
     */
    #[JsonProperty('inventoryQuantity')]
    public ?int $inventoryQuantity;

    /**
     * @var ?array<CommerceProductVariantsItemOptionsItem> $options
     */
    #[JsonProperty('options'), ArrayType([CommerceProductVariantsItemOptionsItem::class])]
    public ?array $options;

    /**
     * @var ?int $priceCents
     */
    #[JsonProperty('priceCents')]
    public ?int $priceCents;

    /**
     * @var ?string $sku
     */
    #[JsonProperty('sku')]
    public ?string $sku;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $variantId
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @param array{
     *   compareAtPriceCents?: ?int,
     *   currency?: ?string,
     *   imageUrl?: ?string,
     *   inStock?: ?bool,
     *   inventoryQuantity?: ?int,
     *   options?: ?array<CommerceProductVariantsItemOptionsItem>,
     *   priceCents?: ?int,
     *   sku?: ?string,
     *   title?: ?string,
     *   variantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->compareAtPriceCents = $values['compareAtPriceCents'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->inStock = $values['inStock'] ?? null;
        $this->inventoryQuantity = $values['inventoryQuantity'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->priceCents = $values['priceCents'] ?? null;
        $this->sku = $values['sku'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->variantId = $values['variantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
