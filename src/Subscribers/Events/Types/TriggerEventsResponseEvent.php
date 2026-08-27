<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TriggerEventsResponseEvent extends JsonSerializableType
{
    /**
     * @var ?bool $definitionCreated Whether the event definition was newly created
     */
    #[JsonProperty('definitionCreated')]
    public ?bool $definitionCreated;

    /**
     * @var ?string $id The created event record ID
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   definitionCreated?: ?bool,
     *   id?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->definitionCreated = $values['definitionCreated'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
