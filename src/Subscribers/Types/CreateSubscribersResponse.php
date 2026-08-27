<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?CreateSubscribersResponseOptIn $optIn Present when the subscriber is awaiting double opt-in confirmation.
     */
    #[JsonProperty('optIn')]
    public ?CreateSubscribersResponseOptIn $optIn;

    /**
     * @var ?CreateSubscribersResponseSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?CreateSubscribersResponseSubscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   optIn?: ?CreateSubscribersResponseOptIn,
     *   subscriber?: ?CreateSubscribersResponseSubscriber,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->optIn = $values['optIn'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
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
