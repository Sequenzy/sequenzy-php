<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\InApp\Types\ListInAppCampaignsRequestStatus;

class ListInAppCampaignsRequest extends JsonSerializableType
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
     * @var ?value-of<ListInAppCampaignsRequestStatus> $status Stored status. sent covers live and ended campaigns; cancelled covers stopped ones.
     */
    public ?string $status;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   status?: ?value-of<ListInAppCampaignsRequestStatus>,
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
