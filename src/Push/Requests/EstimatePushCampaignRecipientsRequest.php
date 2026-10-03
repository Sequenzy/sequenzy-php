<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Push\Types\EstimatePushCampaignRecipientsRequestPlatformsItem;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EstimatePushCampaignRecipientsRequest extends JsonSerializableType
{
    /**
     * @var ?array<value-of<EstimatePushCampaignRecipientsRequestPlatformsItem>> $platforms
     */
    #[JsonProperty('platforms'), ArrayType(['string'])]
    public ?array $platforms;

    /**
     * @var array<string, mixed> $targetLists Audience, same shape as campaign targetLists.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public array $targetLists;

    /**
     * @param array{
     *   targetLists: array<string, mixed>,
     *   platforms?: ?array<value-of<EstimatePushCampaignRecipientsRequestPlatformsItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->platforms = $values['platforms'] ?? null;
        $this->targetLists = $values['targetLists'];
    }
}
