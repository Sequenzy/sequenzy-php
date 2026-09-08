<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Complete editor theme. Required color keys are primary, background, surface, text, mutedText, heading, border and link. Required typography keys are baseFontSize, leadFontSize, baseLineHeight, heading1Size, heading2Size, heading3Size and buttonFontSize. Required layout keys are contentWidth, containerPaddingX, containerPaddingY, blockSpacing, baseRadius, sectionPadding, buttonPaddingX, buttonPaddingY and borderedBlockPadding. Optional theme fields match the editor, including content color, heading font, button radius and weight.
 */
class EmailAiStyleCanvasTheme extends JsonSerializableType
{
    /**
     * @var array<string, string> $colors
     */
    #[JsonProperty('colors'), ArrayType(['string' => 'string'])]
    public array $colors;

    /**
     * @var array<string, float> $layout
     */
    #[JsonProperty('layout'), ArrayType(['string' => 'float'])]
    public array $layout;

    /**
     * @var value-of<EmailAiStyleCanvasThemePresetId> $presetId
     */
    #[JsonProperty('presetId')]
    public string $presetId;

    /**
     * @var array<string, mixed> $typography
     */
    #[JsonProperty('typography'), ArrayType(['string' => 'mixed'])]
    public array $typography;

    /**
     * @param array{
     *   colors: array<string, string>,
     *   layout: array<string, float>,
     *   presetId: value-of<EmailAiStyleCanvasThemePresetId>,
     *   typography: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->colors = $values['colors'];
        $this->layout = $values['layout'];
        $this->presetId = $values['presetId'];
        $this->typography = $values['typography'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
