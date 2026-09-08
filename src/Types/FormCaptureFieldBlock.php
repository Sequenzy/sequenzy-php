<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class FormCaptureFieldBlock extends JsonSerializableType
{
    /**
     * @var string $consentText
     */
    #[JsonProperty('consentText')]
    public string $consentText;

    /**
     * @var string $defaultValue
     */
    #[JsonProperty('defaultValue')]
    public string $defaultValue;

    /**
     * @var value-of<FormCaptureFieldBlockFieldType> $fieldType
     */
    #[JsonProperty('fieldType')]
    public string $fieldType;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var value-of<FormCaptureFieldBlockMapsTo> $mapsTo
     */
    #[JsonProperty('mapsTo')]
    public string $mapsTo;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var array<FormCaptureFieldOption> $options
     */
    #[JsonProperty('options'), ArrayType([FormCaptureFieldOption::class])]
    public array $options;

    /**
     * @var string $placeholder
     */
    #[JsonProperty('placeholder')]
    public string $placeholder;

    /**
     * @var bool $required
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @var bool $showLabel
     */
    #[JsonProperty('showLabel')]
    public bool $showLabel;

    /**
     * @var ?value-of<FormCaptureFieldBlockWidth> $width
     */
    #[JsonProperty('width')]
    public ?string $width;

    /**
     * @param array{
     *   consentText: string,
     *   defaultValue: string,
     *   fieldType: value-of<FormCaptureFieldBlockFieldType>,
     *   id: string,
     *   label: string,
     *   mapsTo: value-of<FormCaptureFieldBlockMapsTo>,
     *   name: string,
     *   options: array<FormCaptureFieldOption>,
     *   placeholder: string,
     *   required: bool,
     *   showLabel: bool,
     *   sectionId?: ?string,
     *   width?: ?value-of<FormCaptureFieldBlockWidth>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->consentText = $values['consentText'];
        $this->defaultValue = $values['defaultValue'];
        $this->fieldType = $values['fieldType'];
        $this->id = $values['id'];
        $this->label = $values['label'];
        $this->mapsTo = $values['mapsTo'];
        $this->name = $values['name'];
        $this->options = $values['options'];
        $this->placeholder = $values['placeholder'];
        $this->required = $values['required'];
        $this->sectionId = $values['sectionId'] ?? null;
        $this->showLabel = $values['showLabel'];
        $this->width = $values['width'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
