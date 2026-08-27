<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListCampaignPollResponsesLegacyRequest extends JsonSerializableType
{
    /**
     * @var ?string $blockId Restrict results to one poll block.
     */
    public ?string $blockId;

    /**
     * @var ?int $limit Responses per page (max 500)
     */
    public ?int $limit;

    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @param array{
     *   blockId?: ?string,
     *   limit?: ?int,
     *   page?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
    }
}
