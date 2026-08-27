<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Page-wide design settings.
 */
class LandingPageContentTheme extends JsonSerializableType
{
    /**
     * @var ?value-of<LandingPageContentThemeSectionAnimation> $sectionAnimation Scroll reveal each section plays as it enters the viewport on the published page. Skipped for visitors who prefer reduced motion.
     */
    #[JsonProperty('sectionAnimation')]
    public ?string $sectionAnimation;

    /**
     * @var ?value-of<LandingPageContentThemeSectionAnimationSpeed> $sectionAnimationSpeed How quickly the scroll reveal settles.
     */
    #[JsonProperty('sectionAnimationSpeed')]
    public ?string $sectionAnimationSpeed;

    /**
     * @param array{
     *   sectionAnimation?: ?value-of<LandingPageContentThemeSectionAnimation>,
     *   sectionAnimationSpeed?: ?value-of<LandingPageContentThemeSectionAnimationSpeed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sectionAnimation = $values['sectionAnimation'] ?? null;
        $this->sectionAnimationSpeed = $values['sectionAnimationSpeed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
