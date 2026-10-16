<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The email the variations are of.
 */
class GenerateEmailVariationsSequencesResponseEmail extends JsonSerializableType
{
    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $nodeId Its step, for rendering a variation with Render Sequence Step.
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @param array{
     *   emailId?: ?string,
     *   label?: ?string,
     *   nodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailId = $values['emailId'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
