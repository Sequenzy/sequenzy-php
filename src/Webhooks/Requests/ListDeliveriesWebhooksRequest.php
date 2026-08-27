<?php

namespace Sequenzy\Webhooks\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListDeliveriesWebhooksRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @param array{
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
