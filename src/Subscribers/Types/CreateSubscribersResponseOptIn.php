<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when the subscriber is awaiting double opt-in confirmation.
 */
class CreateSubscribersResponseOptIn extends JsonSerializableType
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
