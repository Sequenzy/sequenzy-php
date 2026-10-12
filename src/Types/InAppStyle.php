<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Colors, corners and font to draw the item with. Resolved from the step's style preset and overrides against your brand (Email design settings) when the item was created. Colors are
 */
class InAppStyle extends JsonSerializableType
{
    /**
     * @var ?string $backgroundColor
     */
    #[JsonProperty('backgroundColor')]
    public ?string $backgroundColor;

    /**
     * @var ?string $buttonColor Fill of the first link button. Other buttons are outlined in the text color.
     */
    #[JsonProperty('buttonColor')]
    public ?string $buttonColor;

    /**
     * @var ?int $buttonRadius
     */
    #[JsonProperty('buttonRadius')]
    public ?int $buttonRadius;

    /**
     * @var ?string $buttonTextColor
     */
    #[JsonProperty('buttonTextColor')]
    public ?string $buttonTextColor;

    /**
     * @var ?int $cornerRadius
     */
    #[JsonProperty('cornerRadius')]
    public ?int $cornerRadius;

    /**
     * @var ?string $fontFamily CSS font stack from your brand settings.
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?string $mutedTextColor Body text color.
     */
    #[JsonProperty('mutedTextColor')]
    public ?string $mutedTextColor;

    /**
     * @var ?value-of<InAppStylePreset> $preset
     */
    #[JsonProperty('preset')]
    public ?string $preset;

    /**
     * @var ?string $textColor Title color.
     */
    #[JsonProperty('textColor')]
    public ?string $textColor;

    /**
     * @param array{
     *   backgroundColor?: ?string,
     *   buttonColor?: ?string,
     *   buttonRadius?: ?int,
     *   buttonTextColor?: ?string,
     *   cornerRadius?: ?int,
     *   fontFamily?: ?string,
     *   mutedTextColor?: ?string,
     *   preset?: ?value-of<InAppStylePreset>,
     *   textColor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backgroundColor = $values['backgroundColor'] ?? null;
        $this->buttonColor = $values['buttonColor'] ?? null;
        $this->buttonRadius = $values['buttonRadius'] ?? null;
        $this->buttonTextColor = $values['buttonTextColor'] ?? null;
        $this->cornerRadius = $values['cornerRadius'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->mutedTextColor = $values['mutedTextColor'] ?? null;
        $this->preset = $values['preset'] ?? null;
        $this->textColor = $values['textColor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
