<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SyncRuleActions extends JsonSerializableType
{
    /**
     * @var array<string> $addTags
     */
    #[JsonProperty('addTags'), ArrayType(['string'])]
    public array $addTags;

    /**
     * @var array<string> $removeTags
     */
    #[JsonProperty('removeTags'), ArrayType(['string'])]
    public array $removeTags;

    /**
     * @param array{
     *   addTags: array<string>,
     *   removeTags: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->addTags = $values['addTags'];
        $this->removeTags = $values['removeTags'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
