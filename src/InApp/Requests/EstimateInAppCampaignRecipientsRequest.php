<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EstimateInAppCampaignRecipientsRequest extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $targetLists Audience, same shape as campaign targetLists.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public array $targetLists;

    /**
     * @param array{
     *   targetLists: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->targetLists = $values['targetLists'];
    }
}
