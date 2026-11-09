<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppCampaign;
use Sequenzy\Core\Json\JsonProperty;

class SendInAppCampaignResponse extends JsonSerializableType
{
    /**
     * @var ?InAppCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?InAppCampaign $campaign;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaign?: ?InAppCampaign,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
        $this->message = $values['message'] ?? null;
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
