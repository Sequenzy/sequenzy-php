<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * For commerce events with product context - rule only applies when a product on the event matches every specified selector (values within a selector are OR'd).
 */
class SyncRuleConditionsPurchasedProduct extends JsonSerializableType
{
    /**
     * @var ?array<string> $collectionIds
     */
    #[JsonProperty('collectionIds'), ArrayType(['string'])]
    public ?array $collectionIds;

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
     *   productTypes?: ?array<string>,
     *   tags?: ?array<string>,
     *   vendors?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->collectionIds = $values['collectionIds'] ?? null;
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
