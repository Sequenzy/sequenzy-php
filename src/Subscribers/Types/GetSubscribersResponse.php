<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\DetailedSubscriber;
use Sequenzy\Core\Json\JsonProperty;

class GetSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?DetailedSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?DetailedSubscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   subscriber?: ?DetailedSubscriber,
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
