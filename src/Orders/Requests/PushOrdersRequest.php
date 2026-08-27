<?php

namespace Sequenzy\Orders\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\CommerceCustomer;
use Sequenzy\Orders\Types\PushOrdersRequestCustomerTotals;
use Sequenzy\Types\CommerceOrderItem;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Orders\Types\PushOrdersRequestStatus;

class PushOrdersRequest extends JsonSerializableType
{
    /**
     * @var string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var CommerceCustomer $customer
     */
    #[JsonProperty('customer')]
    public CommerceCustomer $customer;

    /**
     * @var ?PushOrdersRequestCustomerTotals $customerTotals Authoritative customer aggregates from your platform. When provided, these override Sequenzy's additive revenue bookkeeping.
     */
    #[JsonProperty('customerTotals')]
    public ?PushOrdersRequestCustomerTotals $customerTotals;

    /**
     * @var ?array<CommerceOrderItem> $items Order line items
     */
    #[JsonProperty('items'), ArrayType([CommerceOrderItem::class])]
    public ?array $items;

    /**
     * @var ?DateTime $orderedAt ISO 8601 timestamp of when the order happened. Defaults to now.
     */
    #[JsonProperty('orderedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $orderedAt;

    /**
     * @var string $orderId Unique order identifier in your platform. Used for idempotency - pushing the same orderId twice never double counts revenue.
     */
    #[JsonProperty('orderId')]
    public string $orderId;

    /**
     * @var ?string $orderNumber Human-facing order number, if different from orderId
     */
    #[JsonProperty('orderNumber')]
    public ?string $orderNumber;

    /**
     * @var ?array<string, mixed> $properties Extra event properties to attach to the triggered ecommerce.* event
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @var ?int $refundAmountCents For refunded orders - refunded amount in cents
     */
    #[JsonProperty('refundAmountCents')]
    public ?int $refundAmountCents;

    /**
     * @var ?value-of<PushOrdersRequestStatus> $status Lifecycle status of this order event
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var int $totalCents Order total in cents
     */
    #[JsonProperty('totalCents')]
    public int $totalCents;

    /**
     * @param array{
     *   currency: string,
     *   customer: CommerceCustomer,
     *   orderId: string,
     *   totalCents: int,
     *   customerTotals?: ?PushOrdersRequestCustomerTotals,
     *   items?: ?array<CommerceOrderItem>,
     *   orderedAt?: ?DateTime,
     *   orderNumber?: ?string,
     *   properties?: ?array<string, mixed>,
     *   refundAmountCents?: ?int,
     *   status?: ?value-of<PushOrdersRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currency = $values['currency'];
        $this->customer = $values['customer'];
        $this->customerTotals = $values['customerTotals'] ?? null;
        $this->items = $values['items'] ?? null;
        $this->orderedAt = $values['orderedAt'] ?? null;
        $this->orderId = $values['orderId'];
        $this->orderNumber = $values['orderNumber'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->refundAmountCents = $values['refundAmountCents'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->totalCents = $values['totalCents'];
    }
}
