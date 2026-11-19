<?php

namespace Sequenzy\Tags\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class MergeTagsRequest extends JsonSerializableType
{
    /**
     * @var string $targetTagId ID of the tag to keep.
     */
    #[JsonProperty('targetTagId')]
    public string $targetTagId;

    /**
     * @param array{
     *   targetTagId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->targetTagId = $values['targetTagId'];
    }
}
