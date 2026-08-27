<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Numeric type settings.
 */
class UpdateCompaniesRequestEmailThemeTypography extends JsonSerializableType
{
    /**
     * @var ?float $baseFontSize
     */
    #[JsonProperty('baseFontSize')]
    public ?float $baseFontSize;

    /**
     * @var ?float $baseLineHeight
     */
    #[JsonProperty('baseLineHeight')]
    public ?float $baseLineHeight;

    /**
     * @var ?float $buttonFontSize
     */
    #[JsonProperty('buttonFontSize')]
    public ?float $buttonFontSize;

    /**
     * @var ?float $buttonFontWeight CTA label weight, clamped to 400-800.
     */
    #[JsonProperty('buttonFontWeight')]
    public ?float $buttonFontWeight;

    /**
     * @var ?float $heading1Size
     */
    #[JsonProperty('heading1Size')]
    public ?float $heading1Size;

    /**
     * @var ?float $heading2Size
     */
    #[JsonProperty('heading2Size')]
    public ?float $heading2Size;

    /**
     * @var ?float $heading3Size
     */
    #[JsonProperty('heading3Size')]
    public ?float $heading3Size;

    /**
     * @var ?string $headingFontFamily Font stack for headings when it differs from the email body font. Omit so headings inherit the email font.
     */
    #[JsonProperty('headingFontFamily')]
    public ?string $headingFontFamily;

    /**
     * @var ?float $headingFontWeight Heading weight applied to all heading levels, clamped to 300-900. Omit for the per-level defaults.
     */
    #[JsonProperty('headingFontWeight')]
    public ?float $headingFontWeight;

    /**
     * @var ?float $headingLetterSpacing Heading letter spacing in pixels (negative = tighter), clamped to -2..4. Omit for natural tracking.
     */
    #[JsonProperty('headingLetterSpacing')]
    public ?float $headingLetterSpacing;

    /**
     * @var ?float $leadFontSize
     */
    #[JsonProperty('leadFontSize')]
    public ?float $leadFontSize;

    /**
     * @param array{
     *   baseFontSize?: ?float,
     *   baseLineHeight?: ?float,
     *   buttonFontSize?: ?float,
     *   buttonFontWeight?: ?float,
     *   heading1Size?: ?float,
     *   heading2Size?: ?float,
     *   heading3Size?: ?float,
     *   headingFontFamily?: ?string,
     *   headingFontWeight?: ?float,
     *   headingLetterSpacing?: ?float,
     *   leadFontSize?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->baseFontSize = $values['baseFontSize'] ?? null;
        $this->baseLineHeight = $values['baseLineHeight'] ?? null;
        $this->buttonFontSize = $values['buttonFontSize'] ?? null;
        $this->buttonFontWeight = $values['buttonFontWeight'] ?? null;
        $this->heading1Size = $values['heading1Size'] ?? null;
        $this->heading2Size = $values['heading2Size'] ?? null;
        $this->heading3Size = $values['heading3Size'] ?? null;
        $this->headingFontFamily = $values['headingFontFamily'] ?? null;
        $this->headingFontWeight = $values['headingFontWeight'] ?? null;
        $this->headingLetterSpacing = $values['headingLetterSpacing'] ?? null;
        $this->leadFontSize = $values['leadFontSize'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
