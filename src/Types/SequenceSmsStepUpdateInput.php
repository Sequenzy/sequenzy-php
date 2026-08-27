<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceSmsStepUpdateInput extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Replacement SMS content blocks (text + image subset).
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?array<string> $imageUrls Up to 2 publicly reachable MMS image URLs. Only valid together with text.
     */
    #[JsonProperty('imageUrls'), ArrayType(['string'])]
    public ?array $imageUrls;

    /**
     * @var ?value-of<SequenceSmsStepUpdateInputIneligibleAction> $ineligibleAction Updated behavior when the contact can't receive SMS.
     */
    #[JsonProperty('ineligibleAction')]
    public ?string $ineligibleAction;

    /**
     * @var ?string $label Updated display label for the step.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var string $nodeId Target action_sms node ID from GET /sequences/{sequenceId}.
     */
    #[JsonProperty('nodeId')]
    public string $nodeId;

    /**
     * @var ?string $text Replacement plain-text message body. Merge tags like {{FIRST_NAME}} work. Provide text or blocks, not both.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @param array{
     *   nodeId: string,
     *   blocks?: ?array<array<string, mixed>>,
     *   imageUrls?: ?array<string>,
     *   ineligibleAction?: ?value-of<SequenceSmsStepUpdateInputIneligibleAction>,
     *   label?: ?string,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->imageUrls = $values['imageUrls'] ?? null;
        $this->ineligibleAction = $values['ineligibleAction'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->nodeId = $values['nodeId'];
        $this->text = $values['text'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
