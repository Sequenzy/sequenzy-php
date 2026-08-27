<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CampaignGoalInput;

class UpdateGoalCampaignsRequest extends JsonSerializableType
{
    /**
     * @var CampaignGoalInput $body
     */
    public CampaignGoalInput $body;

    /**
     * @param array{
     *   body: CampaignGoalInput,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
