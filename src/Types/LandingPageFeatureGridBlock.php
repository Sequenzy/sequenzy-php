<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class LandingPageFeatureGridBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageFeatureGridBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var ?int $columns
     */
    #[JsonProperty('columns')]
    public ?int $columns;

    /**
     * @var array<LandingPageFeature> $features
     */
    #[JsonProperty('features'), ArrayType([LandingPageFeature::class])]
    public array $features;

    /**
     * @var ?value-of<LandingPageFeatureGridBlockLayout> $layout
     */
    #[JsonProperty('layout')]
    public ?string $layout;

    /**
     * @var value-of<LandingPageFeatureGridBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @param array{
     *   id: string,
     *   features: array<LandingPageFeature>,
     *   slot: value-of<LandingPageFeatureGridBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageFeatureGridBlockAlign>,
     *   columns?: ?int,
     *   layout?: ?value-of<LandingPageFeatureGridBlockLayout>,
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
        $this->features = $values['features'];
        $this->layout = $values['layout'] ?? null;
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
