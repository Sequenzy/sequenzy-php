<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Children share the parent slot. Overlay needs exactly one direct image block with at most one gallery image; other overlay groups normalize to stack. Maximum group depth is eight.
 */
class LandingPageGroupBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?array<LandingPageBlock> $children
     */
    #[JsonProperty('children'), ArrayType([LandingPageBlock::class])]
    public ?array $children;

    /**
     * @var ?int $columns
     */
    #[JsonProperty('columns')]
    public ?int $columns;

    /**
     * @var ?int $gap
     */
    #[JsonProperty('gap')]
    public ?int $gap;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?value-of<LandingPageGroupBlockLayout> $layout
     */
    #[JsonProperty('layout')]
    public ?string $layout;

    /**
     * @var ?string $overlayColor
     */
    #[JsonProperty('overlayColor')]
    public ?string $overlayColor;

    /**
     * @var ?value-of<LandingPageGroupBlockOverlayPosition> $overlayPosition
     */
    #[JsonProperty('overlayPosition')]
    public ?string $overlayPosition;

    /**
     * @var ?int $overlayShade
     */
    #[JsonProperty('overlayShade')]
    public ?int $overlayShade;

    /**
     * @var ?int $padding
     */
    #[JsonProperty('padding')]
    public ?int $padding;

    /**
     * @var value-of<LandingPageGroupBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageGroupBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   children?: ?array<LandingPageBlock>,
     *   columns?: ?int,
     *   gap?: ?int,
     *   label?: ?string,
     *   layout?: ?value-of<LandingPageGroupBlockLayout>,
     *   overlayColor?: ?string,
     *   overlayPosition?: ?value-of<LandingPageGroupBlockOverlayPosition>,
     *   overlayShade?: ?int,
     *   padding?: ?int,
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
        $this->children = $values['children'] ?? null;
        $this->columns = $values['columns'] ?? null;
        $this->gap = $values['gap'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->layout = $values['layout'] ?? null;
        $this->overlayColor = $values['overlayColor'] ?? null;
        $this->overlayPosition = $values['overlayPosition'] ?? null;
        $this->overlayShade = $values['overlayShade'] ?? null;
        $this->padding = $values['padding'] ?? null;
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
