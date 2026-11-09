<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EstimateInAppCampaignRecipientsResponse extends JsonSerializableType
{
    /**
     * @var ?int $audienceCount
     */
    #[JsonProperty('audienceCount')]
    public ?int $audienceCount;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   audienceCount?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceCount = $values['audienceCount'] ?? null;
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
