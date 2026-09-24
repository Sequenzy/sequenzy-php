<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListEventsAccountsRequest extends JsonSerializableType
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
