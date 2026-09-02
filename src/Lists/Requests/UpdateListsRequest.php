<?php

namespace Sequenzy\Lists\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $description New internal list description. Never shown in hosted or embedded subscriber preferences. Pass null to clear it.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $isPrivate Set to true to keep the list internal and omit it from individual controls on the hosted subscriber email preferences/unsubscribe page. Set to false to expose only its name on that page; descriptions remain internal. List privacy does not override a subscriber's global unsubscribe. Omit this field to leave the current visibility unchanged.
     */
    #[JsonProperty('isPrivate')]
    public ?bool $isPrivate;

    /**
     * @var ?string $name New list name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   description?: ?string,
     *   isPrivate?: ?bool,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->isPrivate = $values['isPrivate'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
