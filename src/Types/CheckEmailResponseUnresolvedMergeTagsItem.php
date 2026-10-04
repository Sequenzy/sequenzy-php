<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CheckEmailResponseUnresolvedMergeTagsItem extends JsonSerializableType
{
    /**
     * @var ?value-of<CheckEmailResponseUnresolvedMergeTagsItemReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $tag
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @param array{
     *   reason?: ?value-of<CheckEmailResponseUnresolvedMergeTagsItemReason>,
     *   tag?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->reason = $values['reason'] ?? null;
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
