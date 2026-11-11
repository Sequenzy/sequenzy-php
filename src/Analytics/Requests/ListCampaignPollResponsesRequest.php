<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListCampaignPollResponsesRequest extends JsonSerializableType
{
    /**
     * @var ?string $blockId Restrict results to one poll block. Block IDs come from the `polls` array of the campaign metrics endpoint.
     */
    public ?string $blockId;

    /**
     * @var ?bool $hasComment Pass `true` to list only respondents who left a comment, newest comment first.
     */
    public ?bool $hasComment;

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
     *   hasComment?: ?bool,
     *   limit?: ?int,
     *   page?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->hasComment = $values['hasComment'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
    }
}
