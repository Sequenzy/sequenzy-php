<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EmailAiStyleCanvas extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $blocks Native blocks JSON, limited to 500,000 serialized characters. Must contain substantive email content.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public array $blocks;

    /**
     * @var value-of<EmailAiStyleCanvasEmailPreset> $emailPreset
     */
    #[JsonProperty('emailPreset')]
    public string $emailPreset;

    /**
     * @var string $fontFamily
     */
    #[JsonProperty('fontFamily')]
    public string $fontFamily;

    /**
     * @var EmailAiStyleCanvasTheme $theme Complete editor theme. Required color keys are primary, background, surface, text, mutedText, heading, border and link. Required typography keys are baseFontSize, leadFontSize, baseLineHeight, heading1Size, heading2Size, heading3Size and buttonFontSize. Required layout keys are contentWidth, containerPaddingX, containerPaddingY, blockSpacing, baseRadius, sectionPadding, buttonPaddingX, buttonPaddingY and borderedBlockPadding. Optional theme fields match the editor, including content color, heading font, button radius and weight.
     */
    #[JsonProperty('theme')]
    public EmailAiStyleCanvasTheme $theme;

    /**
     * @param array{
     *   blocks: array<array<string, mixed>>,
     *   emailPreset: value-of<EmailAiStyleCanvasEmailPreset>,
     *   fontFamily: string,
     *   theme: EmailAiStyleCanvasTheme,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'];
        $this->emailPreset = $values['emailPreset'];
        $this->fontFamily = $values['fontFamily'];
        $this->theme = $values['theme'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
