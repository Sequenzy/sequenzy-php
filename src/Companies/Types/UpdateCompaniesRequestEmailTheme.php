<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Default email theme. Partial update - omitted fields keep their current value (or the preset default) and numeric values are clamped to supported ranges. Pass null to reset to the platform default theme.
 */
class UpdateCompaniesRequestEmailTheme extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemeButtonStyle> $buttonStyle How primary buttons are filled. "outline" renders them as a transparent box with a brand-color border; "solid" (default) is the classic filled button.
     */
    #[JsonProperty('buttonStyle')]
    public ?string $buttonStyle;

    /**
     * @var ?UpdateCompaniesRequestEmailThemeColors $colors 6-digit hex values.
     */
    #[JsonProperty('colors')]
    public ?UpdateCompaniesRequestEmailThemeColors $colors;

    /**
     * @var ?UpdateCompaniesRequestEmailThemeLayout $layout Numeric layout settings.
     */
    #[JsonProperty('layout')]
    public ?UpdateCompaniesRequestEmailThemeLayout $layout;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemePresetId> $presetId
     */
    #[JsonProperty('presetId')]
    public ?string $presetId;

    /**
     * @var ?UpdateCompaniesRequestEmailThemeTypography $typography Numeric type settings.
     */
    #[JsonProperty('typography')]
    public ?UpdateCompaniesRequestEmailThemeTypography $typography;

    /**
     * @param array{
     *   buttonStyle?: ?value-of<UpdateCompaniesRequestEmailThemeButtonStyle>,
     *   colors?: ?UpdateCompaniesRequestEmailThemeColors,
     *   layout?: ?UpdateCompaniesRequestEmailThemeLayout,
     *   presetId?: ?value-of<UpdateCompaniesRequestEmailThemePresetId>,
     *   typography?: ?UpdateCompaniesRequestEmailThemeTypography,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttonStyle = $values['buttonStyle'] ?? null;
        $this->colors = $values['colors'] ?? null;
        $this->layout = $values['layout'] ?? null;
        $this->presetId = $values['presetId'] ?? null;
        $this->typography = $values['typography'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
