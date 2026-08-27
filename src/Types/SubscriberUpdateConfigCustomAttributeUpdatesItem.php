<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Union;

class SubscriberUpdateConfigCustomAttributeUpdatesItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    string
     *   |float
     *   |bool
     * )|null $value Literal scalar, null to delete, or one standalone merge tag.
     */
    #[JsonProperty('value'), Union('string', 'float', 'bool', 'null')]
    public string|float|bool|null $value;

    /**
     * @var ?value-of<SubscriberUpdateConfigCustomAttributeUpdatesItemValueType> $valueType
     */
    #[JsonProperty('valueType')]
    public ?string $valueType;

    /**
     * @param array{
     *   name: string,
     *   value?: (
     *    string
     *   |float
     *   |bool
     * )|null,
     *   valueType?: ?value-of<SubscriberUpdateConfigCustomAttributeUpdatesItemValueType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->value = $values['value'] ?? null;
        $this->valueType = $values['valueType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
