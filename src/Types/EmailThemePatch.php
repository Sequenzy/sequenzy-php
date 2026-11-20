<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Partial visual theme patch. Omitted fields keep their current value, so {"colors": {"background": "#f3f4f6"}} repaints only the outer canvas, while content controls the inner card the blocks sit on. Colors are 6-digit hex; numeric values are clamped to their supported ranges. Null clears the stored theme.
 */
class EmailThemePatch extends JsonSerializableType
{
    /**
     * @var ?value-of<EmailThemePatchButtonStyle> $buttonStyle
     */
    #[JsonProperty('buttonStyle')]
    public ?string $buttonStyle;

    /**
     * @var ?value-of<EmailThemePatchChromePack> $chromePack Brand-derived. Send back the value a theme read returned so a copied theme renders the same; null removes it.
     */
    #[JsonProperty('chromePack')]
    public ?string $chromePack;

    /**
     * @var ?EmailThemePatchColors $colors
     */
    #[JsonProperty('colors')]
    public ?EmailThemePatchColors $colors;

    /**
     * @var ?bool $headingFontFromBrand Brand-derived. Send back the value a theme read returned so a copied theme renders the same; null removes it.
     */
    #[JsonProperty('headingFontFromBrand')]
    public ?bool $headingFontFromBrand;

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
     * @var ?EmailThemePatchRadiiFromBrand $radiiFromBrand Brand-derived. Send back the value a theme read returned so a copied theme renders the same; null removes it.
     */
    #[JsonProperty('radiiFromBrand')]
    public ?EmailThemePatchRadiiFromBrand $radiiFromBrand;

    /**
     * @var ?array<string, mixed> $signature Brand-derived component styles. Send back the object a theme read returned, unchanged; null removes it.
     */
    #[JsonProperty('signature'), ArrayType(['string' => 'mixed'])]
    public ?array $signature;

    /**
     * @var ?EmailThemePatchTypography $typography
     */
    #[JsonProperty('typography')]
    public ?EmailThemePatchTypography $typography;

    /**
     * @param array{
     *   buttonStyle?: ?value-of<EmailThemePatchButtonStyle>,
     *   chromePack?: ?value-of<EmailThemePatchChromePack>,
     *   colors?: ?EmailThemePatchColors,
     *   headingFontFromBrand?: ?bool,
     *   layout?: ?EmailThemePatchLayout,
     *   presetId?: ?value-of<EmailThemePatchPresetId>,
     *   radiiFromBrand?: ?EmailThemePatchRadiiFromBrand,
     *   signature?: ?array<string, mixed>,
     *   typography?: ?EmailThemePatchTypography,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttonStyle = $values['buttonStyle'] ?? null;
        $this->chromePack = $values['chromePack'] ?? null;
        $this->colors = $values['colors'] ?? null;
        $this->headingFontFromBrand = $values['headingFontFromBrand'] ?? null;
        $this->layout = $values['layout'] ?? null;
        $this->presetId = $values['presetId'] ?? null;
        $this->radiiFromBrand = $values['radiiFromBrand'] ?? null;
        $this->signature = $values['signature'] ?? null;
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
