<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailThemePatchLayout extends JsonSerializableType
{
    /**
     * @var ?float $baseRadius
     */
    #[JsonProperty('baseRadius')]
    public ?float $baseRadius;

    /**
     * @var ?float $blockSpacing
     */
    #[JsonProperty('blockSpacing')]
    public ?float $blockSpacing;

    /**
     * @var ?float $borderedBlockPadding
     */
    #[JsonProperty('borderedBlockPadding')]
    public ?float $borderedBlockPadding;

    /**
     * @var ?float $buttonPaddingX
     */
    #[JsonProperty('buttonPaddingX')]
    public ?float $buttonPaddingX;

    /**
     * @var ?float $buttonPaddingY
     */
    #[JsonProperty('buttonPaddingY')]
    public ?float $buttonPaddingY;

    /**
     * @var ?float $buttonRadius
     */
    #[JsonProperty('buttonRadius')]
    public ?float $buttonRadius;

    /**
     * @var ?float $containerPaddingX
     */
    #[JsonProperty('containerPaddingX')]
    public ?float $containerPaddingX;

    /**
     * @var ?float $containerPaddingY
     */
    #[JsonProperty('containerPaddingY')]
    public ?float $containerPaddingY;

    /**
     * @var ?float $contentWidth
     */
    #[JsonProperty('contentWidth')]
    public ?float $contentWidth;

    /**
     * @var ?float $sectionPadding
     */
    #[JsonProperty('sectionPadding')]
    public ?float $sectionPadding;

    /**
     * @param array{
     *   baseRadius?: ?float,
     *   blockSpacing?: ?float,
     *   borderedBlockPadding?: ?float,
     *   buttonPaddingX?: ?float,
     *   buttonPaddingY?: ?float,
     *   buttonRadius?: ?float,
     *   containerPaddingX?: ?float,
     *   containerPaddingY?: ?float,
     *   contentWidth?: ?float,
     *   sectionPadding?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->baseRadius = $values['baseRadius'] ?? null;
        $this->blockSpacing = $values['blockSpacing'] ?? null;
        $this->borderedBlockPadding = $values['borderedBlockPadding'] ?? null;
        $this->buttonPaddingX = $values['buttonPaddingX'] ?? null;
        $this->buttonPaddingY = $values['buttonPaddingY'] ?? null;
        $this->buttonRadius = $values['buttonRadius'] ?? null;
        $this->containerPaddingX = $values['containerPaddingX'] ?? null;
        $this->containerPaddingY = $values['containerPaddingY'] ?? null;
        $this->contentWidth = $values['contentWidth'] ?? null;
        $this->sectionPadding = $values['sectionPadding'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
