<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\Pagination;
use Sequenzy\Types\PollResponse;
use Sequenzy\Core\Types\ArrayType;

class ListCampaignPollResponsesResponse extends JsonSerializableType
{
    /**
     * @var ?string $blockId Present only when a blockId filter was applied.
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?Pagination $pagination;

    /**
     * @var ?array<PollResponse> $responses
     */
    #[JsonProperty('responses'), ArrayType([PollResponse::class])]
    public ?array $responses;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   blockId?: ?string,
     *   campaignId?: ?string,
     *   pagination?: ?Pagination,
     *   responses?: ?array<PollResponse>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->responses = $values['responses'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
