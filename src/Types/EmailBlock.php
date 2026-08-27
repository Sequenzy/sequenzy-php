<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Email content block. The shape depends on the block type. Any block may carry a `conditions` array so it renders only for matching recipients, the structural `group` type wraps children in Stack, Row, Grid, or Overlay layout, and `conditional-group` adds if/else branching via `ifBranch` and `elseBranch` (each an object with a `children` array).
 */
class EmailBlock extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $children Recursive child blocks for group and repeat containers.
     */
    #[JsonProperty('children'), ArrayType([EmailBlock::class])]
    public ?array $children;

    /**
     * @var ?int $columns Number of columns used by a group with grid layout.
     */
    #[JsonProperty('columns')]
    public ?int $columns;

    /**
     * @var ?array<EmailBlockConditionsItem> $conditions Optional per-block display rules. The block renders only when every rule matches. The same shape is used for a conditional-group block's top-level `conditions`.
     */
    #[JsonProperty('conditions'), ArrayType([EmailBlockConditionsItem::class])]
    public ?array $conditions;

    /**
     * @var ?string $content Content for text, html, and heading-like blocks.
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?int $gap Gap in pixels between direct group children.
     */
    #[JsonProperty('gap')]
    public ?int $gap;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $label Editor label for a structural group block.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?value-of<EmailBlockLayout> $layout Direct-child layout for a structural group block.
     */
    #[JsonProperty('layout')]
    public ?string $layout;

    /**
     * @var ?string $overlayColor Opaque fallback and shade color for an overlay group.
     */
    #[JsonProperty('overlayColor')]
    public ?string $overlayColor;

    /**
     * @var ?value-of<EmailBlockOverlayPosition> $overlayPosition Vertical position of overlay foreground content.
     */
    #[JsonProperty('overlayPosition')]
    public ?string $overlayPosition;

    /**
     * @var ?int $overlayShade Overlay shade intensity as a percentage.
     */
    #[JsonProperty('overlayShade')]
    public ?int $overlayShade;

    /**
     * @var ?int $padding Uniform group padding in pixels; per-side styles.padding* fields override it.
     */
    #[JsonProperty('padding')]
    public ?int $padding;

    /**
     * @var ?EmailBlockStyles $styles Per-block visual styles. For compatibility, style fields such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius can also be supplied at the block top level and are normalized into this object.
     */
    #[JsonProperty('styles')]
    public ?EmailBlockStyles $styles;

    /**
     * @var value-of<EmailBlockType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<EmailBlockType>,
     *   children?: ?array<EmailBlock>,
     *   columns?: ?int,
     *   conditions?: ?array<EmailBlockConditionsItem>,
     *   content?: ?string,
     *   gap?: ?int,
     *   id?: ?string,
     *   label?: ?string,
     *   layout?: ?value-of<EmailBlockLayout>,
     *   overlayColor?: ?string,
     *   overlayPosition?: ?value-of<EmailBlockOverlayPosition>,
     *   overlayShade?: ?int,
     *   padding?: ?int,
     *   styles?: ?EmailBlockStyles,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->children = $values['children'] ?? null;
        $this->columns = $values['columns'] ?? null;
        $this->conditions = $values['conditions'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->gap = $values['gap'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->layout = $values['layout'] ?? null;
        $this->overlayColor = $values['overlayColor'] ?? null;
        $this->overlayPosition = $values['overlayPosition'] ?? null;
        $this->overlayShade = $values['overlayShade'] ?? null;
        $this->padding = $values['padding'] ?? null;
        $this->styles = $values['styles'] ?? null;
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
