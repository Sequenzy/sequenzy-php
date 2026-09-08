<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Embeds a YouTube share URL. Other video providers and direct video files are not supported.
 */
class LandingPageVideoBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageVideoBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var ?value-of<LandingPageVideoBlockAspectRatio> $aspectRatio
     */
    #[JsonProperty('aspectRatio')]
    public ?string $aspectRatio;

    /**
     * @var value-of<LandingPageVideoBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageVideoBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageVideoBlockAlign>,
     *   aspectRatio?: ?value-of<LandingPageVideoBlockAspectRatio>,
     *   title?: ?string,
     *   url?: ?string,
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
        $this->aspectRatio = $values['aspectRatio'] ?? null;
        $this->slot = $values['slot'];
        $this->title = $values['title'] ?? null;
        $this->url = $values['url'] ?? null;
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
