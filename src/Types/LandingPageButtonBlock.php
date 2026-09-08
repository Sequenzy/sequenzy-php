<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;

/**
 * CTA url accepts an HTTPS URL or an in-page anchor such as #form, #section-<sectionId>, #block-<blockId>, or #top. Anchor links open in the same tab.
 */
class LandingPageButtonBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageButtonBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var value-of<LandingPageButtonBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var string $text
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?value-of<LandingPageButtonBlockVariant> $variant
     */
    #[JsonProperty('variant')]
    public ?string $variant;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageButtonBlockSlot>,
     *   text: string,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageButtonBlockAlign>,
     *   url?: ?string,
     *   variant?: ?value-of<LandingPageButtonBlockVariant>,
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
        $this->slot = $values['slot'];
        $this->text = $values['text'];
        $this->url = $values['url'] ?? null;
        $this->variant = $values['variant'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
