<?php

namespace Sequenzy\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present only while a rename or merge of a tag on more than 20,000 subscribers is still moving them. Renames, merges and deletes are refused until it is gone.
 */
class ListTagsResponseChangeInProgress extends JsonSerializableType
{
    /**
     * @var ?string $fromName
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?value-of<ListTagsResponseChangeInProgressKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $sourceTagId The tag a merge deletes when it finishes. Absent for a rename.
     */
    #[JsonProperty('sourceTagId')]
    public ?string $sourceTagId;

    /**
     * @var ?bool $stopped Present and true when the change failed before it finished. Some subscribers still carry fromName, and renames, merges and deletes stay refused until support finishes it.
     */
    #[JsonProperty('stopped')]
    public ?bool $stopped;

    /**
     * @var ?string $tagId The renamed tag, or the tag a merge keeps.
     */
    #[JsonProperty('tagId')]
    public ?string $tagId;

    /**
     * @var ?string $toName
     */
    #[JsonProperty('toName')]
    public ?string $toName;

    /**
     * @param array{
     *   fromName?: ?string,
     *   kind?: ?value-of<ListTagsResponseChangeInProgressKind>,
     *   sourceTagId?: ?string,
     *   stopped?: ?bool,
     *   tagId?: ?string,
     *   toName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromName = $values['fromName'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->sourceTagId = $values['sourceTagId'] ?? null;
        $this->stopped = $values['stopped'] ?? null;
        $this->tagId = $values['tagId'] ?? null;
        $this->toName = $values['toName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
