<?php

namespace Sequenzy\Products\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class UpsertProductsRequestProductsItem extends JsonSerializableType
{
    /**
     * @var ?int $compareAtPriceCents
     */
    #[JsonProperty('compareAtPriceCents')]
    public ?int $compareAtPriceCents;

    /**
     * @var ?string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?bool $inStock Defaults to true, or to whether any variant is available when variants are provided.
     */
    #[JsonProperty('inStock')]
    public ?bool $inStock;

    /**
     * @var ?int $priceCents Price in cents. Defaults to the lowest variant price when variants are provided.
     */
    #[JsonProperty('priceCents')]
    public ?int $priceCents;

    /**
     * @var string $productId Your product identifier. Used as the upsert key.
     */
    #[JsonProperty('productId')]
    public string $productId;

    /**
     * @var ?DateTime $providerCreatedAt Product creation time in the source catalog. Omit to preserve the stored value; pass null to clear it.
     */
    #[JsonProperty('providerCreatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $providerCreatedAt;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $url Public product page URL
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?array<UpsertProductsRequestProductsItemVariantsItem> $variants Product variants. When provided, the variant list is replaced entirely (an empty array removes all variants). Omit to leave existing variants unchanged.
     */
    #[JsonProperty('variants'), ArrayType([UpsertProductsRequestProductsItemVariantsItem::class])]
    public ?array $variants;

    /**
     * @param array{
     *   productId: string,
     *   title: string,
     *   compareAtPriceCents?: ?int,
     *   currency?: ?string,
     *   description?: ?string,
     *   imageUrl?: ?string,
     *   inStock?: ?bool,
     *   priceCents?: ?int,
     *   providerCreatedAt?: ?DateTime,
     *   url?: ?string,
     *   variants?: ?array<UpsertProductsRequestProductsItemVariantsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->compareAtPriceCents = $values['compareAtPriceCents'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->inStock = $values['inStock'] ?? null;
        $this->priceCents = $values['priceCents'] ?? null;
        $this->productId = $values['productId'];
        $this->providerCreatedAt = $values['providerCreatedAt'] ?? null;
        $this->title = $values['title'];
        $this->url = $values['url'] ?? null;
        $this->variants = $values['variants'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
