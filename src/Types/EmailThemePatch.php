<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Partial visual theme patch. Omitted fields keep their current value, so {"colors": {"background": "#ffffff"}} repaints only the background. Colors are 6-digit hex; numeric values are clamped to their supported ranges. Null clears the stored theme.
 */
class EmailThemePatch extends JsonSerializableType
{
    /**
     * @var ?value-of<EmailThemePatchButtonStyle> $buttonStyle
     */
    #[JsonProperty('buttonStyle')]
    public ?string $buttonStyle;

    /**
     * @var ?EmailThemePatchColors $colors
     */
    #[JsonProperty('colors')]
    public ?EmailThemePatchColors $colors;

    /**
     * @var ?EmailThemePatchLayout $layout
     */
    #[JsonProperty('layout')]
    public ?EmailThemePatchLayout $layout;

    /**
     * @var ?value-of<EmailThemePatchPresetId> $presetId
     */
    #[JsonProperty('presetId')]
    public ?string $presetId;

    /**
     * @var ?EmailThemePatchTypography $typography
     */
    #[JsonProperty('typography')]
    public ?EmailThemePatchTypography $typography;

    /**
     * @param array{
     *   buttonStyle?: ?value-of<EmailThemePatchButtonStyle>,
     *   colors?: ?EmailThemePatchColors,
     *   layout?: ?EmailThemePatchLayout,
     *   presetId?: ?value-of<EmailThemePatchPresetId>,
     *   typography?: ?EmailThemePatchTypography,
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
