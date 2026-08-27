<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Optional conditions that must all hold for the rule to apply.
 */
class SyncRuleConditions extends JsonSerializableType
{
    /**
     * @var ?SyncRuleConditionsPurchasedProduct $purchasedProduct For commerce events with product context - rule only applies when a product on the event matches every specified selector (values within a selector are OR'd).
     */
    #[JsonProperty('purchasedProduct')]
    public ?SyncRuleConditionsPurchasedProduct $purchasedProduct;

    /**
     * @var ?array<string> $requiresNotTags Rule only applies if the subscriber has NONE of these tags.
     */
    #[JsonProperty('requiresNotTags'), ArrayType(['string'])]
    public ?array $requiresNotTags;

    /**
     * @var ?array<string> $requiresTags Rule only applies if the subscriber has ALL of these tags.
     */
    #[JsonProperty('requiresTags'), ArrayType(['string'])]
    public ?array $requiresTags;

    /**
     * @param array{
     *   purchasedProduct?: ?SyncRuleConditionsPurchasedProduct,
     *   requiresNotTags?: ?array<string>,
     *   requiresTags?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->purchasedProduct = $values['purchasedProduct'] ?? null;
        $this->requiresNotTags = $values['requiresNotTags'] ?? null;
        $this->requiresTags = $values['requiresTags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
