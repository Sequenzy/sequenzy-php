<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EstimateInAppCampaignRecipientsResponse extends JsonSerializableType
{
    /**
     * @var ?int $appUserCount Contacts in the audience known to have your app connected, from an active iOS or Android device or an in-app message their app displayed. A lower bound; everyone in the audience gets the campaign the next time their app fetches the feed.
     */
    #[JsonProperty('appUserCount')]
    public ?int $appUserCount;

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
     *   appUserCount?: ?int,
     *   audienceCount?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->appUserCount = $values['appUserCount'] ?? null;
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
