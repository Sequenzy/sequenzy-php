<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureTheme extends JsonSerializableType
{
    /**
     * @var string $accentColor
     */
    #[JsonProperty('accentColor')]
    public string $accentColor;

    /**
     * @var string $backgroundColor
     */
    #[JsonProperty('backgroundColor')]
    public string $backgroundColor;

    /**
     * @var string $bodyFontFamily
     */
    #[JsonProperty('bodyFontFamily')]
    public string $bodyFontFamily;

    /**
     * @var string $borderColor
     */
    #[JsonProperty('borderColor')]
    public string $borderColor;

    /**
     * @var int $borderRadius
     */
    #[JsonProperty('borderRadius')]
    public int $borderRadius;

    /**
     * @var string $cardColor
     */
    #[JsonProperty('cardColor')]
    public string $cardColor;

    /**
     * @var value-of<CaptureThemeDensity> $density
     */
    #[JsonProperty('density')]
    public string $density;

    /**
     * @var string $headingFontFamily
     */
    #[JsonProperty('headingFontFamily')]
    public string $headingFontFamily;

    /**
     * @var string $mutedTextColor
     */
    #[JsonProperty('mutedTextColor')]
    public string $mutedTextColor;

    /**
     * @var string $textColor
     */
    #[JsonProperty('textColor')]
    public string $textColor;

    /**
     * @param array{
     *   accentColor: string,
     *   backgroundColor: string,
     *   bodyFontFamily: string,
     *   borderColor: string,
     *   borderRadius: int,
     *   cardColor: string,
     *   density: value-of<CaptureThemeDensity>,
     *   headingFontFamily: string,
     *   mutedTextColor: string,
     *   textColor: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accentColor = $values['accentColor'];
        $this->backgroundColor = $values['backgroundColor'];
        $this->bodyFontFamily = $values['bodyFontFamily'];
        $this->borderColor = $values['borderColor'];
        $this->borderRadius = $values['borderRadius'];
        $this->cardColor = $values['cardColor'];
        $this->density = $values['density'];
        $this->headingFontFamily = $values['headingFontFamily'];
        $this->mutedTextColor = $values['mutedTextColor'];
        $this->textColor = $values['textColor'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
