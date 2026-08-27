<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\RenderEmailRequest;

class RenderCampaignsRequest extends JsonSerializableType
{
    /**
     * @var RenderEmailRequest $body
     */
    public RenderEmailRequest $body;

    /**
     * @param array{
     *   body: RenderEmailRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
