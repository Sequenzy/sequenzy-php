<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\PushCampaign;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListPushCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<PushCampaign> $campaigns
     */
    #[JsonProperty('campaigns'), ArrayType([PushCampaign::class])]
    public ?array $campaigns;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   campaigns?: ?array<PushCampaign>,
     *   success?: ?bool,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaigns = $values['campaigns'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
