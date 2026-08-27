<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SendTestCampaignsRequest extends JsonSerializableType
{
    /**
     * @var string $to Test recipient email address.
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @param array{
     *   to: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->to = $values['to'];
    }
}
