<?php

namespace Sequenzy\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TagDefinition;

class MergeTagsResponse extends JsonSerializableType
{
    /**
     * @var ?int $contactsUpdated Subscribers moved from the merged tag to the kept tag.
     */
    #[JsonProperty('contactsUpdated')]
    public ?int $contactsUpdated;

    /**
     * @var ?value-of<MergeTagsResponseStatus> $status
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
     *   status?: ?value-of<MergeTagsResponseStatus>,
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
