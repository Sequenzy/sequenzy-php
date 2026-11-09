<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\Pagination;
use Sequenzy\Types\CampaignReply;
use Sequenzy\Core\Types\ArrayType;

class ListCampaignRepliesLegacyResponse extends JsonSerializableType
{
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
     * @var ?array<CampaignReply> $replies
     */
    #[JsonProperty('replies'), ArrayType([CampaignReply::class])]
    public ?array $replies;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   pagination?: ?Pagination,
     *   replies?: ?array<CampaignReply>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->replies = $values['replies'] ?? null;
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
