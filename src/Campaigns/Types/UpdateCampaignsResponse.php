<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateCampaignsResponse extends JsonSerializableType
{
    /**
     * @var UpdateCampaignsResponseCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public UpdateCampaignsResponseCampaign $campaign;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   campaign: UpdateCampaignsResponseCampaign,
     *   success: bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->campaign = $values['campaign'];
        $this->success = $values['success'];
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
