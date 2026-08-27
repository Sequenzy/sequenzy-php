<?php

namespace Sequenzy\Orders\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TrackCheckoutStartedResponse extends JsonSerializableType
{
    /**
     * @var ?string $checkoutId
     */
    #[JsonProperty('checkoutId')]
    public ?string $checkoutId;

    /**
     * @var ?string $eventId
     */
    #[JsonProperty('eventId')]
    public ?string $eventId;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   checkoutId?: ?string,
     *   eventId?: ?string,
     *   subscriberId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->checkoutId = $values['checkoutId'] ?? null;
        $this->eventId = $values['eventId'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
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
