<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class LandingPageFormCustomField extends JsonSerializableType
{
    /**
     * @var ?string $consentText
     */
    #[JsonProperty('consentText')]
    public ?string $consentText;

    /**
     * @var ?string $defaultValue
     */
    #[JsonProperty('defaultValue')]
    public ?string $defaultValue;

    /**
     * @var ?value-of<LandingPageFormCustomFieldInputType> $inputType
     */
    #[JsonProperty('inputType')]
    public ?string $inputType;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<LandingPageFormCustomFieldOptionsItem> $options
     */
    #[JsonProperty('options'), ArrayType([LandingPageFormCustomFieldOptionsItem::class])]
    public ?array $options;

    /**
     * @var ?string $placeholder
     */
    #[JsonProperty('placeholder')]
    public ?string $placeholder;

    /**
     * @var ?bool $required
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @param array{
     *   name: string,
     *   consentText?: ?string,
     *   defaultValue?: ?string,
     *   inputType?: ?value-of<LandingPageFormCustomFieldInputType>,
     *   label?: ?string,
     *   options?: ?array<LandingPageFormCustomFieldOptionsItem>,
     *   placeholder?: ?string,
     *   required?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->consentText = $values['consentText'] ?? null;
        $this->defaultValue = $values['defaultValue'] ?? null;
        $this->inputType = $values['inputType'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->name = $values['name'];
        $this->options = $values['options'] ?? null;
        $this->placeholder = $values['placeholder'] ?? null;
        $this->required = $values['required'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
