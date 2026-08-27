<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Campaigns\Types\DuplicateCampaignsRequestMode;
use Sequenzy\Core\Json\JsonProperty;

class DuplicateCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<DuplicateCampaignsRequestMode> $mode campaign copies the campaign email, ab_test also copies the linked A/B test and variants, variant copies one variant's content as a plain campaign.
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?string $variantId Variant ID to copy. Required when mode is variant.
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @param array{
     *   mode?: ?value-of<DuplicateCampaignsRequestMode>,
     *   variantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mode = $values['mode'] ?? null;
        $this->variantId = $values['variantId'] ?? null;
    }
}
