<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageTheme extends JsonSerializableType
{
    /**
     * @var ?string $accentColor
     */
    #[JsonProperty('accentColor')]
    public ?string $accentColor;

    /**
     * @var ?value-of<LandingPageThemeAccentStyle> $accentStyle
     */
    #[JsonProperty('accentStyle')]
    public ?string $accentStyle;

    /**
     * @var ?string $backgroundColor
     */
    #[JsonProperty('backgroundColor')]
    public ?string $backgroundColor;

    /**
     * @var ?string $bodyFontFamily
     */
    #[JsonProperty('bodyFontFamily')]
    public ?string $bodyFontFamily;

    /**
     * @var ?int $borderRadius
     */
    #[JsonProperty('borderRadius')]
    public ?int $borderRadius;

    /**
     * @var ?string $cardColor
     */
    #[JsonProperty('cardColor')]
    public ?string $cardColor;

    /**
     * @var ?value-of<LandingPageThemeDensity> $density
     */
    #[JsonProperty('density')]
    public ?string $density;

    /**
     * @var ?value-of<LandingPageThemeFontPair> $fontPair
     */
    #[JsonProperty('fontPair')]
    public ?string $fontPair;

    /**
     * @var ?string $headingFontFamily
     */
    #[JsonProperty('headingFontFamily')]
    public ?string $headingFontFamily;

    /**
     * @var ?string $mutedTextColor
     */
    #[JsonProperty('mutedTextColor')]
    public ?string $mutedTextColor;

    /**
     * @var ?value-of<LandingPageThemeSectionAnimation> $sectionAnimation Scroll reveal animation; skipped for visitors who prefer reduced motion.
     */
    #[JsonProperty('sectionAnimation')]
    public ?string $sectionAnimation;

    /**
     * @var ?value-of<LandingPageThemeSectionAnimationSpeed> $sectionAnimationSpeed
     */
    #[JsonProperty('sectionAnimationSpeed')]
    public ?string $sectionAnimationSpeed;

    /**
     * @var ?value-of<LandingPageThemeSurfaceStyle> $surfaceStyle
     */
    #[JsonProperty('surfaceStyle')]
    public ?string $surfaceStyle;

    /**
     * @var ?string $textColor
     */
    #[JsonProperty('textColor')]
    public ?string $textColor;

    /**
     * @param array{
     *   accentColor?: ?string,
     *   accentStyle?: ?value-of<LandingPageThemeAccentStyle>,
     *   backgroundColor?: ?string,
     *   bodyFontFamily?: ?string,
     *   borderRadius?: ?int,
     *   cardColor?: ?string,
     *   density?: ?value-of<LandingPageThemeDensity>,
     *   fontPair?: ?value-of<LandingPageThemeFontPair>,
     *   headingFontFamily?: ?string,
     *   mutedTextColor?: ?string,
     *   sectionAnimation?: ?value-of<LandingPageThemeSectionAnimation>,
     *   sectionAnimationSpeed?: ?value-of<LandingPageThemeSectionAnimationSpeed>,
     *   surfaceStyle?: ?value-of<LandingPageThemeSurfaceStyle>,
     *   textColor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accentColor = $values['accentColor'] ?? null;
        $this->accentStyle = $values['accentStyle'] ?? null;
        $this->backgroundColor = $values['backgroundColor'] ?? null;
        $this->bodyFontFamily = $values['bodyFontFamily'] ?? null;
        $this->borderRadius = $values['borderRadius'] ?? null;
        $this->cardColor = $values['cardColor'] ?? null;
        $this->density = $values['density'] ?? null;
        $this->fontPair = $values['fontPair'] ?? null;
        $this->headingFontFamily = $values['headingFontFamily'] ?? null;
        $this->mutedTextColor = $values['mutedTextColor'] ?? null;
        $this->sectionAnimation = $values['sectionAnimation'] ?? null;
        $this->sectionAnimationSpeed = $values['sectionAnimationSpeed'] ?? null;
        $this->surfaceStyle = $values['surfaceStyle'] ?? null;
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
