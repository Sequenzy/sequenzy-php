<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailBlockConditionsItem extends JsonSerializableType
{
    /**
     * @var value-of<EmailBlockConditionsItemField> $field `variable` resolves a merge-tag path from the transactional send `variables` or an automation `event` payload (nested paths like `order.total` or `event.plan` work). `attribute` reads a stored subscriber attribute. `email`, `firstName`, and `lastName` read core subscriber fields.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<EmailBlockConditionsItemOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var string $value For `variable` and `attribute`, use `name:value` - the part before the colon is the variable path or attribute name, and the part after it is the comparison value. For `email`, `firstName`, and `lastName`, provide the plain comparison string.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<EmailBlockConditionsItemField>,
     *   id: string,
     *   operator: value-of<EmailBlockConditionsItemOperator>,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->id = $values['id'];
        $this->operator = $values['operator'];
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
