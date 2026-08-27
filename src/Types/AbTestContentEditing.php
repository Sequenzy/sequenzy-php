<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Where a sequence A/B step's copy lives and which tools change it.
 */
class AbTestContentEditing extends JsonSerializableType
{
    /**
     * @var string $note
     */
    #[JsonProperty('note')]
    public string $note;

    /**
     * @var string $readTool
     */
    #[JsonProperty('readTool')]
    public string $readTool;

    /**
     * @var array<string> $requiredScopes
     */
    #[JsonProperty('requiredScopes'), ArrayType(['string'])]
    public array $requiredScopes;

    /**
     * @var string $writeTool
     */
    #[JsonProperty('writeTool')]
    public string $writeTool;

    /**
     * @param array{
     *   note: string,
     *   readTool: string,
     *   requiredScopes: array<string>,
     *   writeTool: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->note = $values['note'];
        $this->readTool = $values['readTool'];
        $this->requiredScopes = $values['requiredScopes'];
        $this->writeTool = $values['writeTool'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
