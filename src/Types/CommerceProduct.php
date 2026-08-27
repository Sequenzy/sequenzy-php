<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class CommerceProduct extends JsonSerializableType
{
    /**
     * @var ?int $compareAtPrice
     */
    #[JsonProperty('compareAtPrice')]
    public ?int $compareAtPrice;

    /**
     * @var ?int $compareAtPriceCents
     */
    #[JsonProperty('compareAtPriceCents')]
    public ?int $compareAtPriceCents;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?ProductDigitalDelivery $digitalDelivery
     */
    #[JsonProperty('digitalDelivery')]
    public ?ProductDigitalDelivery $digitalDelivery;

    /**
     * @var ?string $id Internal Sequenzy product ID
     */
    #[JsonProperty('id')]
    public ?string $id;

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
     * @var ?int $price Unit price in cents
     */
    #[JsonProperty('price')]
    public ?int $price;

    /**
     * @var ?int $priceCents
     */
    #[JsonProperty('priceCents')]
    public ?int $priceCents;

    /**
     * @var ?string $productId Your product identifier (providerProductId)
     */
    #[JsonProperty('productId')]
    public ?string $productId;

    /**
     * @var ?value-of<CommerceProductProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?DateTime $providerCreatedAt Product creation time reported by the source catalog. Used for newest-product ranking.
     */
    #[JsonProperty('providerCreatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $providerCreatedAt;

    /**
     * @var ?string $providerProductId Provider product identifier
     */
    #[JsonProperty('providerProductId')]
    public ?string $providerProductId;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?array<CommerceProductVariantsItem> $variants For Stripe products, every active Stripe price of the product (variantId is the Stripe price ID).
     */
    #[JsonProperty('variants'), ArrayType([CommerceProductVariantsItem::class])]
    public ?array $variants;

    /**
     * @param array{
     *   compareAtPrice?: ?int,
     *   compareAtPriceCents?: ?int,
     *   createdAt?: ?DateTime,
     *   currency?: ?string,
     *   description?: ?string,
     *   digitalDelivery?: ?ProductDigitalDelivery,
     *   id?: ?string,
     *   imageUrl?: ?string,
     *   inStock?: ?bool,
     *   price?: ?int,
     *   priceCents?: ?int,
     *   productId?: ?string,
     *   provider?: ?value-of<CommerceProductProvider>,
     *   providerCreatedAt?: ?DateTime,
     *   providerProductId?: ?string,
     *   title?: ?string,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     *   variants?: ?array<CommerceProductVariantsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->compareAtPrice = $values['compareAtPrice'] ?? null;
        $this->compareAtPriceCents = $values['compareAtPriceCents'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->digitalDelivery = $values['digitalDelivery'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->inStock = $values['inStock'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->priceCents = $values['priceCents'] ?? null;
        $this->productId = $values['productId'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->providerCreatedAt = $values['providerCreatedAt'] ?? null;
        $this->providerProductId = $values['providerProductId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
