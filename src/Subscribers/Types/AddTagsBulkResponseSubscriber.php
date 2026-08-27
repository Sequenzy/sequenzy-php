<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AddTagsBulkResponseSubscriber extends JsonSerializableType
{
    /**
     * @var ?bool $created
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?string $email Null for phone-only (SMS) contacts.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @param array{
     *   created?: ?bool,
     *   email?: ?string,
     *   id?: ?string,
     *   tags?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
