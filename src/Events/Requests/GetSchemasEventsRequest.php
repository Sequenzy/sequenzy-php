<?php

namespace Sequenzy\Events\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Events\Types\GetSchemasEventsRequestProvider;

class GetSchemasEventsRequest extends JsonSerializableType
{
    /**
     * @var ?string $eventName Event to describe, such as ecommerce.order_placed. Legacy aliases like order.completed resolve to their current name. Omit to list every documented event.
     */
    public ?string $eventName;

    /**
     * @var ?value-of<GetSchemasEventsRequestProvider> $provider Return only this provider's payload: shopify, woocommerce, manual, api, or stripe.
     */
    public ?string $provider;

    /**
     * @param array{
     *   eventName?: ?string,
     *   provider?: ?value-of<GetSchemasEventsRequestProvider>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventName = $values['eventName'] ?? null;
        $this->provider = $values['provider'] ?? null;
    }
}
