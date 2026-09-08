<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageHeadingBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageHeadingBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var string $content
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var ?int $level
     */
    #[JsonProperty('level')]
    public ?int $level;

    /**
     * @var value-of<LandingPageHeadingBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @param array{
     *   id: string,
     *   content: string,
     *   slot: value-of<LandingPageHeadingBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageHeadingBlockAlign>,
     *   level?: ?int,
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
        $this->content = $values['content'];
        $this->level = $values['level'] ?? null;
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
