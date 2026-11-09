<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListCampaignRepliesRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Replies per page (max 500)
     */
    public ?int $limit;

    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @param array{
     *   limit?: ?int,
     *   page?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
    }
}
