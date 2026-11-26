<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Default email theme. Partial update - omitted fields keep their current value (or the preset default) and numeric values are clamped to supported ranges. Pass null to reset to the platform default theme.
 */
class UpdateCompaniesRequestEmailTheme extends JsonSerializableType
{
    /**
     * @var ?UpdateCompaniesRequestEmailThemeBackgroundImage $backgroundImage Optional email-level background image painted over the solid fallback color (classic Windows Outlook falls back to the solid color). Pass null to remove it.
     */
    #[JsonProperty('backgroundImage')]
    public ?UpdateCompaniesRequestEmailThemeBackgroundImage $backgroundImage;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemeButtonStyle> $buttonStyle How primary buttons are filled. "outline" renders them as a transparent box with a brand-color border; "solid" (default) is the classic filled button.
     */
    #[JsonProperty('buttonStyle')]
    public ?string $buttonStyle;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemeChromePack> $chromePack Brand-derived. Send back the value a theme read returned so a copied theme renders the same; null removes it.
     */
    #[JsonProperty('chromePack')]
    public ?string $chromePack;

    /**
     * @var ?UpdateCompaniesRequestEmailThemeColors $colors 6-digit hex values.
     */
    #[JsonProperty('colors')]
    public ?UpdateCompaniesRequestEmailThemeColors $colors;

    /**
     * @var ?bool $headingFontFromBrand Brand-derived. Send back the value a theme read returned so a copied theme renders the same; null removes it.
     */
    #[JsonProperty('headingFontFromBrand')]
    public ?bool $headingFontFromBrand;

    /**
     * @var ?UpdateCompaniesRequestEmailThemeLayout $layout Layout settings. Every field is a number except contentAlign and contentWidthMode.
     */
    #[JsonProperty('layout')]
    public ?UpdateCompaniesRequestEmailThemeLayout $layout;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemePresetId> $presetId
     */
    #[JsonProperty('presetId')]
    public ?string $presetId;

    /**
     * @var ?UpdateCompaniesRequestEmailThemeRadiiFromBrand $radiiFromBrand Brand-derived. Send back the value a theme read returned so a copied theme renders the same; null removes it.
     */
    #[JsonProperty('radiiFromBrand')]
    public ?UpdateCompaniesRequestEmailThemeRadiiFromBrand $radiiFromBrand;

    /**
     * @var ?array<string, mixed> $signature Brand-derived component styles. Send back the object a theme read returned, unchanged; null removes it.
     */
    #[JsonProperty('signature'), ArrayType(['string' => 'mixed'])]
    public ?array $signature;

    /**
     * @var ?UpdateCompaniesRequestEmailThemeTypography $typography Type settings. Every field is a number except the headingFontFamily and footerFontFamily stacks.
     */
    #[JsonProperty('typography')]
    public ?UpdateCompaniesRequestEmailThemeTypography $typography;

    /**
     * @param array{
     *   backgroundImage?: ?UpdateCompaniesRequestEmailThemeBackgroundImage,
     *   buttonStyle?: ?value-of<UpdateCompaniesRequestEmailThemeButtonStyle>,
     *   chromePack?: ?value-of<UpdateCompaniesRequestEmailThemeChromePack>,
     *   colors?: ?UpdateCompaniesRequestEmailThemeColors,
     *   headingFontFromBrand?: ?bool,
     *   layout?: ?UpdateCompaniesRequestEmailThemeLayout,
     *   presetId?: ?value-of<UpdateCompaniesRequestEmailThemePresetId>,
     *   radiiFromBrand?: ?UpdateCompaniesRequestEmailThemeRadiiFromBrand,
     *   signature?: ?array<string, mixed>,
     *   typography?: ?UpdateCompaniesRequestEmailThemeTypography,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backgroundImage = $values['backgroundImage'] ?? null;
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
