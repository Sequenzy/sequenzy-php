<?php

namespace Sequenzy\Lists\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $isPrivate Set to true to keep the list internal and omit it from individual controls on the hosted subscriber email preferences/unsubscribe page. Public lists expose their name and description on that page. List privacy does not override a subscriber's global unsubscribe. Defaults to false when omitted.
     */
    #[JsonProperty('isPrivate')]
    public ?bool $isPrivate;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     *   description?: ?string,
     *   isPrivate?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'] ?? null;
        $this->isPrivate = $values['isPrivate'] ?? null;
        $this->name = $values['name'];
    }
}
