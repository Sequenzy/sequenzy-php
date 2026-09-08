<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class LandingPageTestimonialBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageTestimonialBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var ?int $columns
     */
    #[JsonProperty('columns')]
    public ?int $columns;

    /**
     * @var ?value-of<LandingPageTestimonialBlockLayout> $layout
     */
    #[JsonProperty('layout')]
    public ?string $layout;

    /**
     * @var value-of<LandingPageTestimonialBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var array<LandingPageTestimonial> $testimonials
     */
    #[JsonProperty('testimonials'), ArrayType([LandingPageTestimonial::class])]
    public array $testimonials;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageTestimonialBlockSlot>,
     *   testimonials: array<LandingPageTestimonial>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageTestimonialBlockAlign>,
     *   columns?: ?int,
     *   layout?: ?value-of<LandingPageTestimonialBlockLayout>,
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
        $this->layout = $values['layout'] ?? null;
        $this->slot = $values['slot'];
        $this->testimonials = $values['testimonials'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
