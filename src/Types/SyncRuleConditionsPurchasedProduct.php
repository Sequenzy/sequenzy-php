<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Rule only applies when a product on the event matches every specified selector (values within a selector are OR'd). `names` and `productIds` match the product a payment or commerce event carries; the other selectors match commerce catalog products.
 */
class SyncRuleConditionsPurchasedProduct extends JsonSerializableType
{
    /**
     * @var ?array<string> $collectionIds
     */
    #[JsonProperty('collectionIds'), ArrayType(['string'])]
    public ?array $collectionIds;

    /**
     * @var ?array<string> $names Product names, compared without regard to case.
     */
    #[JsonProperty('names'), ArrayType(['string'])]
    public ?array $names;

    /**
     * @var ?array<string> $productIds Product IDs as the provider issues them.
     */
    #[JsonProperty('productIds'), ArrayType(['string'])]
    public ?array $productIds;

    /**
     * @var ?array<string> $productTypes
     */
    #[JsonProperty('productTypes'), ArrayType(['string'])]
    public ?array $productTypes;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?array<string> $vendors
     */
    #[JsonProperty('vendors'), ArrayType(['string'])]
    public ?array $vendors;

    /**
     * @param array{
     *   collectionIds?: ?array<string>,
     *   names?: ?array<string>,
     *   productIds?: ?array<string>,
     *   productTypes?: ?array<string>,
     *   tags?: ?array<string>,
     *   vendors?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->collectionIds = $values['collectionIds'] ?? null;
        $this->names = $values['names'] ?? null;
        $this->productIds = $values['productIds'] ?? null;
        $this->productTypes = $values['productTypes'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->vendors = $values['vendors'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
