<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ResumeCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?int $spreadOverHours Spread remaining delivery over this many hours. Pass null to clear an existing spread. With an A/B test, this sets the sending rate and the current phase's remaining recipients are spread over their share of it. If the account has a minimum spread, a lower, missing or cleared value is raised to it.
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
