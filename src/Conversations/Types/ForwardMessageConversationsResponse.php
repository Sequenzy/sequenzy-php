<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ForwardMessageConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?ForwardMessageConversationsResponseForward $forward
     */
    #[JsonProperty('forward')]
    public ?ForwardMessageConversationsResponseForward $forward;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   forward?: ?ForwardMessageConversationsResponseForward,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->forward = $values['forward'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
