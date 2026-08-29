<?php

namespace Sequenzy\EmailDesignSystem\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Partial visual-grammar adjustment; omitted tokens keep their current value.
 */
class UpdateEmailDesignSystemRequestDesignCode extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateEmailDesignSystemRequestDesignCodeButtonShape> $buttonShape
     */
    #[JsonProperty('buttonShape')]
    public ?string $buttonShape;

    /**
     * @var ?value-of<UpdateEmailDesignSystemRequestDesignCodeDensity> $density
     */
    #[JsonProperty('density')]
    public ?string $density;

    /**
     * @var ?value-of<UpdateEmailDesignSystemRequestDesignCodeDividerStyle> $dividerStyle
     */
    #[JsonProperty('dividerStyle')]
    public ?string $dividerStyle;

    /**
     * @var ?value-of<UpdateEmailDesignSystemRequestDesignCodeKickerStyle> $kickerStyle How eyebrows above titles render.
     */
    #[JsonProperty('kickerStyle')]
    public ?string $kickerStyle;

    /**
     * @var ?array<value-of<UpdateEmailDesignSystemRequestDesignCodeOpenerTreatmentsItem>> $openerTreatments The opener treatments this company's emails may use, primary first.
     */
    #[JsonProperty('openerTreatments'), ArrayType(['string'])]
    public ?array $openerTreatments;

    /**
     * @var ?value-of<UpdateEmailDesignSystemRequestDesignCodeTitleAlignment> $titleAlignment
     */
    #[JsonProperty('titleAlignment')]
    public ?string $titleAlignment;

    /**
     * @param array{
     *   buttonShape?: ?value-of<UpdateEmailDesignSystemRequestDesignCodeButtonShape>,
     *   density?: ?value-of<UpdateEmailDesignSystemRequestDesignCodeDensity>,
     *   dividerStyle?: ?value-of<UpdateEmailDesignSystemRequestDesignCodeDividerStyle>,
     *   kickerStyle?: ?value-of<UpdateEmailDesignSystemRequestDesignCodeKickerStyle>,
     *   openerTreatments?: ?array<value-of<UpdateEmailDesignSystemRequestDesignCodeOpenerTreatmentsItem>>,
     *   titleAlignment?: ?value-of<UpdateEmailDesignSystemRequestDesignCodeTitleAlignment>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttonShape = $values['buttonShape'] ?? null;
        $this->density = $values['density'] ?? null;
        $this->dividerStyle = $values['dividerStyle'] ?? null;
        $this->kickerStyle = $values['kickerStyle'] ?? null;
        $this->openerTreatments = $values['openerTreatments'] ?? null;
        $this->titleAlignment = $values['titleAlignment'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
