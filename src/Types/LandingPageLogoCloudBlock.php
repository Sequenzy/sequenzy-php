<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class LandingPageLogoCloudBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageLogoCloudBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var ?int $columns
     */
    #[JsonProperty('columns')]
    public ?int $columns;

    /**
     * @var ?string $heading
     */
    #[JsonProperty('heading')]
    public ?string $heading;

    /**
     * @var array<LandingPageLogo> $logos
     */
    #[JsonProperty('logos'), ArrayType([LandingPageLogo::class])]
    public array $logos;

    /**
     * @var value-of<LandingPageLogoCloudBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @param array{
     *   id: string,
     *   logos: array<LandingPageLogo>,
     *   slot: value-of<LandingPageLogoCloudBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageLogoCloudBlockAlign>,
     *   columns?: ?int,
     *   heading?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->sectionAlign = $values['sectionAlign'] ?? null;
        $this->sectionId = $values['sectionId'] ?? null;
        $this->sectionKind = $values['sectionKind'] ?? null;
        $this->sectionLabel = $values['sectionLabel'] ?? null;
        $this->sectionLayout = $values['sectionLayout'] ?? null;
        $this->sectionVariant = $values['sectionVariant'] ?? null;
        $this->align = $values['align'] ?? null;
        $this->columns = $values['columns'] ?? null;
        $this->heading = $values['heading'] ?? null;
        $this->logos = $values['logos'];
        $this->slot = $values['slot'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
