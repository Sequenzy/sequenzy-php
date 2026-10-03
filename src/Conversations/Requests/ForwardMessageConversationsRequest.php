<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ForwardMessageConversationsRequest extends JsonSerializableType
{
    /**
     * @var ?string $senderProfileId Sender profile to forward from. Its sending domain must be verified. When omitted, the company default sender is used.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var string $to One email address to forward the message to.
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @param array{
     *   to: string,
     *   senderProfileId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->to = $values['to'];
    }
}
