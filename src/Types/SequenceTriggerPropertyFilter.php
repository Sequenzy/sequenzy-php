<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Union;

class SequenceTriggerPropertyFilter extends JsonSerializableType
{
    /**
     * @var value-of<SequenceTriggerPropertyFilterOperator> $operator Comparison operator. Value is required for every operator except exists and not_exists. `one_of` matches when the property equals any entry of the value array.
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var string $path Dot-path into the event properties. Use [] to match items inside arrays.
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @var (
     *    string
     *   |float
     *   |bool
     *   |array<(
     *    string
     *   |float
     * )>
     * )|null $value Value to compare against. For `one_of`, pass a non-empty array of strings or numbers (maximum 50 values); all other operators take a single value.
     */
    #[JsonProperty('value'), Union('string', 'float', 'bool', [new Union('string', 'float')], 'null')]
    public string|float|bool|array|null $value;

    /**
     * @param array{
     *   operator: value-of<SequenceTriggerPropertyFilterOperator>,
     *   path: string,
     *   value?: (
     *    string
     *   |float
     *   |bool
     *   |array<(
     *    string
     *   |float
     * )>
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->operator = $values['operator'];
        $this->path = $values['path'];
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
