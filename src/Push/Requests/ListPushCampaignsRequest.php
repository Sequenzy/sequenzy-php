<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Push\Types\ListPushCampaignsRequestStatus;

class ListPushCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $offset
     */
    public ?int $offset;

    /**
     * @var ?value-of<ListPushCampaignsRequestStatus> $status
     */
    public ?string $status;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   status?: ?value-of<ListPushCampaignsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
