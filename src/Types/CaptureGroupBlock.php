<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CaptureGroupBlock extends JsonSerializableType
{
    /**
     * @var array<FormCaptureBlock> $children
     */
    #[JsonProperty('children'), ArrayType([FormCaptureBlock::class])]
    public array $children;

    /**
     * @var int $columns
     */
    #[JsonProperty('columns')]
    public int $columns;

    /**
     * @var int $gap
     */
    #[JsonProperty('gap')]
    public int $gap;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var value-of<CaptureGroupBlockLayout> $layout
     */
    #[JsonProperty('layout')]
    public string $layout;

    /**
     * @var string $overlayColor
     */
    #[JsonProperty('overlayColor')]
    public string $overlayColor;

    /**
     * @var value-of<CaptureGroupBlockOverlayPosition> $overlayPosition
     */
    #[JsonProperty('overlayPosition')]
    public string $overlayPosition;

    /**
     * @var int $overlayShade
     */
    #[JsonProperty('overlayShade')]
    public int $overlayShade;

    /**
     * @var int $padding
     */
    #[JsonProperty('padding')]
    public int $padding;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @param array{
     *   children: array<FormCaptureBlock>,
     *   columns: int,
     *   gap: int,
     *   id: string,
     *   label: string,
     *   layout: value-of<CaptureGroupBlockLayout>,
     *   overlayColor: string,
     *   overlayPosition: value-of<CaptureGroupBlockOverlayPosition>,
     *   overlayShade: int,
     *   padding: int,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->children = $values['children'];
        $this->columns = $values['columns'];
        $this->gap = $values['gap'];
        $this->id = $values['id'];
        $this->label = $values['label'];
        $this->layout = $values['layout'];
        $this->overlayColor = $values['overlayColor'];
        $this->overlayPosition = $values['overlayPosition'];
        $this->overlayShade = $values['overlayShade'];
        $this->padding = $values['padding'];
        $this->sectionId = $values['sectionId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
