<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Existing relative dotted paths. Blank values use defaults; unsafe prototype paths are rejected. Suggestions do not replace existing mappings.
 */
class PreviewCartItemsRequestItemFields extends JsonSerializableType
{
    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?string $price
     */
    #[JsonProperty('price')]
    public ?string $price;

    /**
     * @var ?string $priceCents
     */
    #[JsonProperty('priceCents')]
    public ?string $priceCents;

    /**
     * @var ?string $quantity
     */
    #[JsonProperty('quantity')]
    public ?string $quantity;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $variantTitle
     */
    #[JsonProperty('variantTitle')]
    public ?string $variantTitle;

    /**
     * @param array{
     *   currency?: ?string,
     *   imageUrl?: ?string,
     *   price?: ?string,
     *   priceCents?: ?string,
     *   quantity?: ?string,
     *   title?: ?string,
     *   url?: ?string,
     *   variantTitle?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currency = $values['currency'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->priceCents = $values['priceCents'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->url = $values['url'] ?? null;
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
