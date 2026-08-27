<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

class Product extends JsonSerializableType
{
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
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?bool $inStock For Stripe products, false means archived in Stripe.
     */
    #[JsonProperty('inStock')]
    public ?bool $inStock;

    /**
     * @var ?int $price Price in cents
     */
    #[JsonProperty('price')]
    public ?int $price;

    /**
     * @var ?value-of<ProductProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $providerProductId
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
     * @param array{
     *   createdAt?: ?DateTime,
     *   currency?: ?string,
     *   description?: ?string,
     *   digitalDelivery?: ?ProductDigitalDelivery,
     *   id?: ?string,
     *   imageUrl?: ?string,
     *   inStock?: ?bool,
     *   price?: ?int,
     *   provider?: ?value-of<ProductProvider>,
     *   providerProductId?: ?string,
     *   title?: ?string,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->digitalDelivery = $values['digitalDelivery'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->inStock = $values['inStock'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->providerProductId = $values['providerProductId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
