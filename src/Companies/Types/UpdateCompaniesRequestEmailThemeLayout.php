<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Layout settings. Every field is a number except contentAlign and contentWidthMode.
 */
class UpdateCompaniesRequestEmailThemeLayout extends JsonSerializableType
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
     * @var ?value-of<UpdateCompaniesRequestEmailThemeLayoutContentAlign> $contentAlign Where the content column sits in a wide email client. center (default) or left (flush left, like a plain personal email). With left, buttons, the logo and footers line up on the left too unless set to right, or centered with styles.keepAlign. Phones show the column full width either way.
     */
    #[JsonProperty('contentAlign')]
    public ?string $contentAlign;

    /**
     * @var ?float $contentWidth
     */
    #[JsonProperty('contentWidth')]
    public ?float $contentWidth;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemeLayoutContentWidthMode> $contentWidthMode fixed (default) keeps the content in a column of contentWidth; fluid runs it the full width of the reader's window, like an email written in Gmail or Apple Mail, with no fixed-width Outlook table. A fluid email sits on the left (buttons, the logo and footers too), and image blocks keep the size contentWidth gives them instead of stretching (an image with no align of its own sits on the left). Phones show the email full width either way.
     */
    #[JsonProperty('contentWidthMode')]
    public ?string $contentWidthMode;

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
     *   contentAlign?: ?value-of<UpdateCompaniesRequestEmailThemeLayoutContentAlign>,
     *   contentWidth?: ?float,
     *   contentWidthMode?: ?value-of<UpdateCompaniesRequestEmailThemeLayoutContentWidthMode>,
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
        $this->contentAlign = $values['contentAlign'] ?? null;
        $this->contentWidth = $values['contentWidth'] ?? null;
        $this->contentWidthMode = $values['contentWidthMode'] ?? null;
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
