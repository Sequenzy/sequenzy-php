<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CampaignSummary;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<CampaignSummary> $campaigns
     */
    #[JsonProperty('campaigns'), ArrayType([CampaignSummary::class])]
    public ?array $campaigns;

    /**
     * @var ?ListCampaignsResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?ListCampaignsResponsePagination $pagination;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaigns?: ?array<CampaignSummary>,
     *   pagination?: ?ListCampaignsResponsePagination,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaigns = $values['campaigns'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
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
