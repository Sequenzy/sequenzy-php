<?php

namespace Sequenzy\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TagDefinition;

class UpdateTagsResponse extends JsonSerializableType
{
    /**
     * @var ?int $contactsUpdated Subscribers whose tag was renamed. Present only when name was sent.
     */
    #[JsonProperty('contactsUpdated')]
    public ?int $contactsUpdated;

    /**
     * @var ?value-of<UpdateTagsResponseStatus> $status Present only when name was sent.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?TagDefinition $tag
     */
    #[JsonProperty('tag')]
    public ?TagDefinition $tag;

    /**
     * @param array{
     *   contactsUpdated?: ?int,
     *   status?: ?value-of<UpdateTagsResponseStatus>,
     *   success?: ?bool,
     *   tag?: ?TagDefinition,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contactsUpdated = $values['contactsUpdated'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tag = $values['tag'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
