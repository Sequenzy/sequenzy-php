<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpsertProductsRequestProductsItemVariantsItem extends JsonSerializableType
{
    /**
     * @var ?int $compareAtPriceCents
     */
    #[JsonProperty('compareAtPriceCents')]
    public ?int $compareAtPriceCents;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?bool $inStock Defaults to inventoryQuantity > 0 when provided, otherwise true.
     */
    #[JsonProperty('inStock')]
    public ?bool $inStock;

    /**
     * @var ?int $inventoryQuantity
     */
    #[JsonProperty('inventoryQuantity')]
    public ?int $inventoryQuantity;

    /**
     * @var ?array<UpsertProductsRequestProductsItemVariantsItemOptionsItem> $options
     */
    #[JsonProperty('options'), ArrayType([UpsertProductsRequestProductsItemVariantsItemOptionsItem::class])]
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
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $variantId Your variant identifier
     */
    #[JsonProperty('variantId')]
    public string $variantId;

    /**
     * @param array{
     *   title: string,
     *   variantId: string,
     *   compareAtPriceCents?: ?int,
     *   imageUrl?: ?string,
     *   inStock?: ?bool,
     *   inventoryQuantity?: ?int,
     *   options?: ?array<UpsertProductsRequestProductsItemVariantsItemOptionsItem>,
     *   priceCents?: ?int,
     *   sku?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->compareAtPriceCents = $values['compareAtPriceCents'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->inStock = $values['inStock'] ?? null;
        $this->inventoryQuantity = $values['inventoryQuantity'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->priceCents = $values['priceCents'] ?? null;
        $this->sku = $values['sku'] ?? null;
        $this->title = $values['title'];
        $this->variantId = $values['variantId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
