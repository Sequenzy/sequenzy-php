<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IntegrationProviderCapabilityEmitsItem extends JsonSerializableType
{
    /**
     * @var ?string $event Event name a sequence triggers on.
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?string $when The real-world moment that produces this event.
     */
    #[JsonProperty('when')]
    public ?string $when;

    /**
     * @param array{
     *   event?: ?string,
     *   when?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->event = $values['event'] ?? null;
        $this->when = $values['when'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
