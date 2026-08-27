<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * One field a block condition may filter on. A block's own `field` and `operator` entries are two flat enums that pool every field's operators together, and the schema narrows them against each other when it validates - so `{"field": "tag", "operator": "is"}` parses and is then rejected. This is that narrowing, spelled out.
 */
class EmailBlockConditionFieldReference extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $example A valid condition using this field.
     */
    #[JsonProperty('example'), ArrayType(['string' => 'mixed'])]
    public array $example;

    /**
     * @var string $field
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var array<string> $operators The only operators this field accepts.
     */
    #[JsonProperty('operators'), ArrayType(['string'])]
    public array $operators;

    /**
     * @var value-of<EmailBlockConditionFieldReferencePreviewSupport> $previewSupport What a render needs before it can evaluate this field. any_contact - resolved from merge data. inline_tags_or_stored_subscriber - tag, which an inline contact can state for itself. stored_subscriber - needs subscriberId. A condition a render cannot evaluate renders as false and is listed in that render's unevaluatedConditions.
     */
    #[JsonProperty('previewSupport')]
    public string $previewSupport;

    /**
     * @var bool $serverEvaluated Whether the field reads stored subscriber state rather than the merge data of the send.
     */
    #[JsonProperty('serverEvaluated')]
    public bool $serverEvaluated;

    /**
     * @var string $valueFormat How the `value` string is shaped for this field.
     */
    #[JsonProperty('valueFormat')]
    public string $valueFormat;

    /**
     * @var ?array<string> $values Closed value set, for the fields that have one.
     */
    #[JsonProperty('values'), ArrayType(['string'])]
    public ?array $values;

    /**
     * @param array{
     *   example: array<string, mixed>,
     *   field: string,
     *   label: string,
     *   operators: array<string>,
     *   previewSupport: value-of<EmailBlockConditionFieldReferencePreviewSupport>,
     *   serverEvaluated: bool,
     *   valueFormat: string,
     *   values?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->example = $values['example'];
        $this->field = $values['field'];
        $this->label = $values['label'];
        $this->operators = $values['operators'];
        $this->previewSupport = $values['previewSupport'];
        $this->serverEvaluated = $values['serverEvaluated'];
        $this->valueFormat = $values['valueFormat'];
        $this->values = $values['values'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
