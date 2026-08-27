<?php

namespace Sequenzy\Products\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class SyncStripeProductsRequest extends JsonSerializableType
{
    /**
     * @var ?string $integrationId Stripe integration to sync. When omitted, the most recently connected active integration with bulk sync enabled is used.
     */
    public ?string $integrationId;

    /**
     * @param array{
     *   integrationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->integrationId = $values['integrationId'] ?? null;
    }
}
