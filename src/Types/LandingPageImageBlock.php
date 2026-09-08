<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class LandingPageImageBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageImageBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var ?string $alt
     */
    #[JsonProperty('alt')]
    public ?string $alt;

    /**
     * @var ?value-of<LandingPageImageBlockFit> $fit
     */
    #[JsonProperty('fit')]
    public ?string $fit;

    /**
     * @var ?int $height
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var ?array<LandingPageImageItem> $images
     */
    #[JsonProperty('images'), ArrayType([LandingPageImageItem::class])]
    public ?array $images;

    /**
     * @var value-of<LandingPageImageBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var ?string $src
     */
    #[JsonProperty('src')]
    public ?string $src;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageImageBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageImageBlockAlign>,
     *   alt?: ?string,
     *   fit?: ?value-of<LandingPageImageBlockFit>,
     *   height?: ?int,
     *   images?: ?array<LandingPageImageItem>,
     *   src?: ?string,
     *   width?: ?int,
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
        $this->alt = $values['alt'] ?? null;
        $this->fit = $values['fit'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->images = $values['images'] ?? null;
        $this->slot = $values['slot'];
        $this->src = $values['src'] ?? null;
        $this->width = $values['width'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
