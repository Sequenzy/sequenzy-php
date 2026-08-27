<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Discount configuration for dynamic create_discount steps.
 */
class SequenceDiscountInput extends JsonSerializableType
{
    /**
     * @var ?float $amountOff Fixed discount amount in the smallest currency unit, for example 500 for $5. Required when discountType is amount.
     */
    #[JsonProperty('amountOff')]
    public ?float $amountOff;

    /**
     * @var ?bool $appliesToAllPlans Whether the discount applies to all plans. Defaults to true.
     */
    #[JsonProperty('appliesToAllPlans')]
    public ?bool $appliesToAllPlans;

    /**
     * @var ?string $codePrefix Optional prefix for generated dynamic codes. The final code also includes a subscriber/token suffix.
     */
    #[JsonProperty('codePrefix')]
    public ?string $codePrefix;

    /**
     * @var ?string $currency ISO currency for fixed-amount discounts. Defaults to usd.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?value-of<SequenceDiscountInputDiscountType> $discountType Discount type for create_discount steps.
     */
    #[JsonProperty('discountType')]
    public ?string $discountType;

    /**
     * @var ?value-of<SequenceDiscountInputDuration> $duration Discount duration. Defaults to once.
     */
    #[JsonProperty('duration')]
    public ?string $duration;

    /**
     * @var ?float $durationInMonths Required for repeating discounts.
     */
    #[JsonProperty('durationInMonths')]
    public ?float $durationInMonths;

    /**
     * @var ?string $expiresAt Optional future expiration date or ISO timestamp. Mutually exclusive with expiresInHours.
     */
    #[JsonProperty('expiresAt')]
    public ?string $expiresAt;

    /**
     * @var ?float $expiresInHours Optional relative expiration in hours, resolved when each subscriber's code is created. Takes precedence over expiresAt.
     */
    #[JsonProperty('expiresInHours')]
    public ?float $expiresInHours;

    /**
     * @var ?string $label Builder label for discount steps.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?bool $lockToSubscriber Stripe-only. Restrict each generated promotion code to the matched subscriber's Stripe customer.
     */
    #[JsonProperty('lockToSubscriber')]
    public ?bool $lockToSubscriber;

    /**
     * @var ?float $maxRedemptions Maximum redemptions for each generated code. Use 1 for subscriber-specific codes.
     */
    #[JsonProperty('maxRedemptions')]
    public ?float $maxRedemptions;

    /**
     * @var ?string $name Optional display name for each dynamically generated provider discount.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?float $percentOff Percent discount. Required when discountType is percent.
     */
    #[JsonProperty('percentOff')]
    public ?float $percentOff;

    /**
     * @var ?array<string> $planIds Provider product IDs when appliesToAllPlans is false. Stripe uses IDs like prod_abc123; Shopify accepts numeric product IDs or gid://shopify/Product/... IDs.
     */
    #[JsonProperty('planIds'), ArrayType(['string'])]
    public ?array $planIds;

    /**
     * @var ?value-of<SequenceDiscountInputProvider> $provider Discount provider. Use stripe to dynamically create a Stripe coupon plus promotion code, or shopify to dynamically create a Shopify Admin discount code.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @param array{
     *   amountOff?: ?float,
     *   appliesToAllPlans?: ?bool,
     *   codePrefix?: ?string,
     *   currency?: ?string,
     *   discountType?: ?value-of<SequenceDiscountInputDiscountType>,
     *   duration?: ?value-of<SequenceDiscountInputDuration>,
     *   durationInMonths?: ?float,
     *   expiresAt?: ?string,
     *   expiresInHours?: ?float,
     *   label?: ?string,
     *   lockToSubscriber?: ?bool,
     *   maxRedemptions?: ?float,
     *   name?: ?string,
     *   percentOff?: ?float,
     *   planIds?: ?array<string>,
     *   provider?: ?value-of<SequenceDiscountInputProvider>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountOff = $values['amountOff'] ?? null;
        $this->appliesToAllPlans = $values['appliesToAllPlans'] ?? null;
        $this->codePrefix = $values['codePrefix'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->discountType = $values['discountType'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->durationInMonths = $values['durationInMonths'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->expiresInHours = $values['expiresInHours'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->lockToSubscriber = $values['lockToSubscriber'] ?? null;
        $this->maxRedemptions = $values['maxRedemptions'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->percentOff = $values['percentOff'] ?? null;
        $this->planIds = $values['planIds'] ?? null;
        $this->provider = $values['provider'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
