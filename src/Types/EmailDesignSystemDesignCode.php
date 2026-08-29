<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * The locked visual grammar applied to every generated email.
 */
class EmailDesignSystemDesignCode extends JsonSerializableType
{
    /**
     * @var value-of<EmailDesignSystemDesignCodeButtonShape> $buttonShape
     */
    #[JsonProperty('buttonShape')]
    public string $buttonShape;

    /**
     * @var value-of<EmailDesignSystemDesignCodeDensity> $density
     */
    #[JsonProperty('density')]
    public string $density;

    /**
     * @var value-of<EmailDesignSystemDesignCodeDividerStyle> $dividerStyle
     */
    #[JsonProperty('dividerStyle')]
    public string $dividerStyle;

    /**
     * @var value-of<EmailDesignSystemDesignCodeKickerStyle> $kickerStyle
     */
    #[JsonProperty('kickerStyle')]
    public string $kickerStyle;

    /**
     * @var array<value-of<EmailDesignSystemDesignCodeOpenerTreatmentsItem>> $openerTreatments
     */
    #[JsonProperty('openerTreatments'), ArrayType(['string'])]
    public array $openerTreatments;

    /**
     * @var value-of<EmailDesignSystemDesignCodeTitleAlignment> $titleAlignment
     */
    #[JsonProperty('titleAlignment')]
    public string $titleAlignment;

    /**
     * @var int $version
     */
    #[JsonProperty('version')]
    public int $version;

    /**
     * @param array{
     *   buttonShape: value-of<EmailDesignSystemDesignCodeButtonShape>,
     *   density: value-of<EmailDesignSystemDesignCodeDensity>,
     *   dividerStyle: value-of<EmailDesignSystemDesignCodeDividerStyle>,
     *   kickerStyle: value-of<EmailDesignSystemDesignCodeKickerStyle>,
     *   openerTreatments: array<value-of<EmailDesignSystemDesignCodeOpenerTreatmentsItem>>,
     *   titleAlignment: value-of<EmailDesignSystemDesignCodeTitleAlignment>,
     *   version: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->buttonShape = $values['buttonShape'];
        $this->density = $values['density'];
        $this->dividerStyle = $values['dividerStyle'];
        $this->kickerStyle = $values['kickerStyle'];
        $this->openerTreatments = $values['openerTreatments'];
        $this->titleAlignment = $values['titleAlignment'];
        $this->version = $values['version'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
