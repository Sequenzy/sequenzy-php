<?php

namespace Sequenzy\Orders\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\CommerceCustomer;
use Sequenzy\Types\CommerceOrderItem;
use Sequenzy\Core\Types\ArrayType;

class TrackCheckoutStartedRequest extends JsonSerializableType
{
    /**
     * @var string $checkoutId Unique checkout identifier in your platform
     */
    #[JsonProperty('checkoutId')]
    public string $checkoutId;

    /**
     * @var ?string $checkoutUrl URL the customer can use to resume the checkout
     */
    #[JsonProperty('checkoutUrl')]
    public ?string $checkoutUrl;

    /**
     * @var ?string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var CommerceCustomer $customer
     */
    #[JsonProperty('customer')]
    public CommerceCustomer $customer;

    /**
     * @var ?array<CommerceOrderItem> $items Checkout line items
     */
    #[JsonProperty('items'), ArrayType([CommerceOrderItem::class])]
    public ?array $items;

    /**
     * @var ?array<string, mixed> $properties Extra event properties to attach to the triggered event
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @var ?int $totalCents Checkout total in cents
     */
    #[JsonProperty('totalCents')]
    public ?int $totalCents;

    /**
     * @param array{
     *   checkoutId: string,
     *   customer: CommerceCustomer,
     *   checkoutUrl?: ?string,
     *   currency?: ?string,
     *   items?: ?array<CommerceOrderItem>,
     *   properties?: ?array<string, mixed>,
     *   totalCents?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->checkoutId = $values['checkoutId'];
        $this->checkoutUrl = $values['checkoutUrl'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->customer = $values['customer'];
        $this->items = $values['items'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->totalCents = $values['totalCents'] ?? null;
    }
}
