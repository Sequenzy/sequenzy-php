<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ResumeCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?int $spreadOverHours Spread remaining delivery over this many hours. Pass null to clear an existing spread.
     */
    #[JsonProperty('spreadOverHours')]
    public ?int $spreadOverHours;

    /**
     * @param array{
     *   spreadOverHours?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->spreadOverHours = $values['spreadOverHours'] ?? null;
    }
}
