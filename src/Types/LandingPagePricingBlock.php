<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Pricing buttonUrl accepts an HTTPS URL or an in-page anchor such as #form.
 */
class LandingPagePricingBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPagePricingBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var string $buttonText
     */
    #[JsonProperty('buttonText')]
    public string $buttonText;

    /**
     * @var ?string $buttonUrl
     */
    #[JsonProperty('buttonUrl')]
    public ?string $buttonUrl;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $eyebrow
     */
    #[JsonProperty('eyebrow')]
    public ?string $eyebrow;

    /**
     * @var array<string> $features
     */
    #[JsonProperty('features'), ArrayType(['string'])]
    public array $features;

    /**
     * @var string $heading
     */
    #[JsonProperty('heading')]
    public string $heading;

    /**
     * @var ?string $period
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var string $price
     */
    #[JsonProperty('price')]
    public string $price;

    /**
     * @var value-of<LandingPagePricingBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @param array{
     *   id: string,
     *   buttonText: string,
     *   features: array<string>,
     *   heading: string,
     *   price: string,
     *   slot: value-of<LandingPagePricingBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPagePricingBlockAlign>,
     *   buttonUrl?: ?string,
     *   description?: ?string,
     *   eyebrow?: ?string,
     *   period?: ?string,
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
        $this->buttonText = $values['buttonText'];
        $this->buttonUrl = $values['buttonUrl'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->eyebrow = $values['eyebrow'] ?? null;
        $this->features = $values['features'];
        $this->heading = $values['heading'];
        $this->period = $values['period'] ?? null;
        $this->price = $values['price'];
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
