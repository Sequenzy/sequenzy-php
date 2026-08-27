<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when this event created a brand-new subscriber while workspace double opt-in is enabled. The subscriber stays pending and matching sequences wait until they confirm.
 */
class TriggerEventsResponseOptIn extends JsonSerializableType
{
    /**
     * @var ?bool $emailQueued
     */
    #[JsonProperty('emailQueued')]
    public ?bool $emailQueued;

    /**
     * @var ?bool $required
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @param array{
     *   emailQueued?: ?bool,
     *   required?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailQueued = $values['emailQueued'] ?? null;
        $this->required = $values['required'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
