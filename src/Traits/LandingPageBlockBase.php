<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\LandingPageBlockBaseSectionAlign;
use Sequenzy\Types\LandingPageBlockBaseSectionLayout;
use Sequenzy\Core\Json\JsonProperty;

/**
 * @property string $id
 * @property ?value-of<LandingPageBlockBaseSectionAlign> $sectionAlign
 * @property ?string $sectionId
 * @property ?string $sectionKind
 * @property ?string $sectionLabel
 * @property ?value-of<LandingPageBlockBaseSectionLayout> $sectionLayout
 * @property ?string $sectionVariant
 */
trait LandingPageBlockBase
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?value-of<LandingPageBlockBaseSectionAlign> $sectionAlign
     */
    #[JsonProperty('sectionAlign')]
    public ?string $sectionAlign;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @var ?string $sectionKind
     */
    #[JsonProperty('sectionKind')]
    public ?string $sectionKind;

    /**
     * @var ?string $sectionLabel
     */
    #[JsonProperty('sectionLabel')]
    public ?string $sectionLabel;

    /**
     * @var ?value-of<LandingPageBlockBaseSectionLayout> $sectionLayout
     */
    #[JsonProperty('sectionLayout')]
    public ?string $sectionLayout;

    /**
     * @var ?string $sectionVariant
     */
    #[JsonProperty('sectionVariant')]
    public ?string $sectionVariant;
}
