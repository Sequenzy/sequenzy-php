<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Campaigns\Types\PreviewComputedDataCampaignsRequestSubscriber;
use Sequenzy\Core\Json\JsonProperty;

class PreviewComputedDataCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?PreviewComputedDataCampaignsRequestSubscriber $subscriber Inline subscriber preview data.
     */
    #[JsonProperty('subscriber')]
    public ?PreviewComputedDataCampaignsRequestSubscriber $subscriber;

    /**
     * @var ?string $subscriberId Existing subscriber ID to use for preview.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @param array{
     *   subscriber?: ?PreviewComputedDataCampaignsRequestSubscriber,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subscriber = $values['subscriber'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
