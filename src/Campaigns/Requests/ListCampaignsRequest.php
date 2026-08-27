<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Campaigns\Types\ListCampaignsRequestStatus;

class ListCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?string $label Optional label name filter. Only campaigns assigned this label are returned.
     */
    public ?string $label;

    /**
     * @var ?int $limit Optional page size. Values above 100 are capped to 100.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Optional zero-based row offset.
     */
    public ?int $offset;

    /**
     * @var ?value-of<ListCampaignsRequestStatus> $status Optional campaign status filter.
     */
    public ?string $status;

    /**
     * @param array{
     *   label?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     *   status?: ?value-of<ListCampaignsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
