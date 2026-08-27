<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RenderEmailResponseUnevaluatedConditionsItem extends JsonSerializableType
{
    /**
     * @var string $description The condition in the words the dashboard uses.
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $field Condition field, such as tag or segment.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var string $hint What to change to get this condition evaluated.
     */
    #[JsonProperty('hint')]
    public string $hint;

    /**
     * @var string $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var value-of<RenderEmailResponseUnevaluatedConditionsItemReason> $reason requires_stored_subscriber - the field reads stored subscriber state, so pass subscriberId, or for a tag condition pass tags on the inline subscriber. invalid_filter - the stored condition is malformed, which fails closed on a real send too; hint carries the validation error. evaluation_failed - the lookup itself failed and the render is worth retrying.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   description: string,
     *   field: string,
     *   hint: string,
     *   operator: string,
     *   reason: value-of<RenderEmailResponseUnevaluatedConditionsItemReason>,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'];
        $this->field = $values['field'];
        $this->hint = $values['hint'];
        $this->operator = $values['operator'];
        $this->reason = $values['reason'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
