<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when this request created a brand-new subscriber while workspace double opt-in is enabled. The tags are applied, but the subscriber stays pending and tag automations wait until they confirm.
 */
class AddTagsBulkResponseOptIn extends JsonSerializableType
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
