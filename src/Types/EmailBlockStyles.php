<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Per-block visual styles. For compatibility, style fields such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius can also be supplied at the block top level and are normalized into this object.
 */
class EmailBlockStyles extends JsonSerializableType
{
    /**
     * @var ?string $backgroundColor
     */
    #[JsonProperty('backgroundColor')]
    public ?string $backgroundColor;

    /**
     * @var ?float $backgroundOpacity Background opacity percentage from 0 to 100.
     */
    #[JsonProperty('backgroundOpacity')]
    public ?float $backgroundOpacity;

    /**
     * @var ?bool $bleed Stretch the block edge-to-edge across the email container. Top-level blocks only.
     */
    #[JsonProperty('bleed')]
    public ?bool $bleed;

    /**
     * @var ?string $borderColor
     */
    #[JsonProperty('borderColor')]
    public ?string $borderColor;

    /**
     * @var ?float $borderRadius
     */
    #[JsonProperty('borderRadius')]
    public ?float $borderRadius;

    /**
     * @var ?float $borderWidth
     */
    #[JsonProperty('borderWidth')]
    public ?float $borderWidth;

    /**
     * @var ?float $paddingBottom
     */
    #[JsonProperty('paddingBottom')]
    public ?float $paddingBottom;

    /**
     * @var ?float $paddingLeft
     */
    #[JsonProperty('paddingLeft')]
    public ?float $paddingLeft;

    /**
     * @var ?float $paddingRight
     */
    #[JsonProperty('paddingRight')]
    public ?float $paddingRight;

    /**
     * @var ?float $paddingTop
     */
    #[JsonProperty('paddingTop')]
    public ?float $paddingTop;

    /**
     * @var ?value-of<EmailBlockStylesTextAlign> $textAlign
     */
    #[JsonProperty('textAlign')]
    public ?string $textAlign;

    /**
     * @var ?string $textColor
     */
    #[JsonProperty('textColor')]
    public ?string $textColor;

    /**
     * @param array{
     *   backgroundColor?: ?string,
     *   backgroundOpacity?: ?float,
     *   bleed?: ?bool,
     *   borderColor?: ?string,
     *   borderRadius?: ?float,
     *   borderWidth?: ?float,
     *   paddingBottom?: ?float,
     *   paddingLeft?: ?float,
     *   paddingRight?: ?float,
     *   paddingTop?: ?float,
     *   textAlign?: ?value-of<EmailBlockStylesTextAlign>,
     *   textColor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backgroundColor = $values['backgroundColor'] ?? null;
        $this->backgroundOpacity = $values['backgroundOpacity'] ?? null;
        $this->bleed = $values['bleed'] ?? null;
        $this->borderColor = $values['borderColor'] ?? null;
        $this->borderRadius = $values['borderRadius'] ?? null;
        $this->borderWidth = $values['borderWidth'] ?? null;
        $this->paddingBottom = $values['paddingBottom'] ?? null;
        $this->paddingLeft = $values['paddingLeft'] ?? null;
        $this->paddingRight = $values['paddingRight'] ?? null;
        $this->paddingTop = $values['paddingTop'] ?? null;
        $this->textAlign = $values['textAlign'] ?? null;
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
