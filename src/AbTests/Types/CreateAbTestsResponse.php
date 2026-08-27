<?php

namespace Sequenzy\AbTests\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AbTest;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\AbTestContentEditing;
use Sequenzy\Core\Types\ArrayType;

class CreateAbTestsResponse extends JsonSerializableType
{
    /**
     * @var ?AbTest $abTest
     */
    #[JsonProperty('abTest')]
    public ?AbTest $abTest;

    /**
     * @var ?AbTestContentEditing $contentEditing
     */
    #[JsonProperty('contentEditing')]
    public ?AbTestContentEditing $contentEditing;

    /**
     * @var ?array<string, mixed> $nodeConfig Rewritten action_ab_test node configuration. Present for sequence conversions only.
     */
    #[JsonProperty('nodeConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $nodeConfig;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   abTest?: ?AbTest,
     *   contentEditing?: ?AbTestContentEditing,
     *   nodeConfig?: ?array<string, mixed>,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTest = $values['abTest'] ?? null;
        $this->contentEditing = $values['contentEditing'] ?? null;
        $this->nodeConfig = $values['nodeConfig'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
