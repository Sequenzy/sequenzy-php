<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ListAttributesSubscribersResponseAttributesItem extends JsonSerializableType
{
    /**
     * @var bool $isArray Whether the attribute holds a list of values on the sampled contacts. Always false for names that only older contacts carry, because the attribute index does not record list shape.
     */
    #[JsonProperty('isArray')]
    public bool $isArray;

    /**
     * @var string $key Attribute name, or a dot path for nested attributes.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var bool $mixedTypes True when sampled contacts hold different types for this attribute, for example zip codes stored as numbers on some contacts and strings on others. valueType is then string, the only type that keeps every value intact.
     */
    #[JsonProperty('mixedTypes')]
    public bool $mixedTypes;

    /**
     * @var int $sampledContacts How many of the sampled contacts carry the attribute. 0 when only older contacts carry it.
     */
    #[JsonProperty('sampledContacts')]
    public int $sampledContacts;

    /**
     * @var ?string $sampleValue An example value as text, truncated to 50 characters. List examples from sampled contacts show up to three items. Null when no example is available.
     */
    #[JsonProperty('sampleValue')]
    public ?string $sampleValue;

    /**
     * @var value-of<ListAttributesSubscribersResponseAttributesItemValueType> $valueType JSON type of the example value. For a list attribute, the type of its items. string when mixedTypes is true.
     */
    #[JsonProperty('valueType')]
    public string $valueType;

    /**
     * @param array{
     *   isArray: bool,
     *   key: string,
     *   mixedTypes: bool,
     *   sampledContacts: int,
     *   valueType: value-of<ListAttributesSubscribersResponseAttributesItemValueType>,
     *   sampleValue?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->isArray = $values['isArray'];
        $this->key = $values['key'];
        $this->mixedTypes = $values['mixedTypes'];
        $this->sampledContacts = $values['sampledContacts'];
        $this->sampleValue = $values['sampleValue'] ?? null;
        $this->valueType = $values['valueType'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
