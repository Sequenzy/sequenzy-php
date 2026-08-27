<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Subscriber;
use Sequenzy\Core\Json\JsonProperty;

class UpdateSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?Subscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?Subscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   subscriber?: ?Subscriber,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
