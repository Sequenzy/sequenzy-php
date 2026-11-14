<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The auto-added footer's resolved settings, defaults included. Change it with `footerTheme` on the company update.
 */
class CompanyFooterTheme extends JsonSerializableType
{
    /**
     * @var ?string $backgroundColor
     */
    #[JsonProperty('backgroundColor')]
    public ?string $backgroundColor;

    /**
     * @var ?string $borderColor
     */
    #[JsonProperty('borderColor')]
    public ?string $borderColor;

    /**
     * @var ?string $companyTextColor
     */
    #[JsonProperty('companyTextColor')]
    public ?string $companyTextColor;

    /**
     * @var ?string $linkColor
     */
    #[JsonProperty('linkColor')]
    public ?string $linkColor;

    /**
     * @var ?string $metaTextColor
     */
    #[JsonProperty('metaTextColor')]
    public ?string $metaTextColor;

    /**
     * @var ?value-of<CompanyFooterThemeMode> $mode
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?string $privacyPolicyText Empty when the localized default is used.
     */
    #[JsonProperty('privacyPolicyText')]
    public ?string $privacyPolicyText;

    /**
     * @var ?string $reasonText Empty when the localized default is used.
     */
    #[JsonProperty('reasonText')]
    public ?string $reasonText;

    /**
     * @var ?bool $showCompanyLine
     */
    #[JsonProperty('showCompanyLine')]
    public ?bool $showCompanyLine;

    /**
     * @var ?value-of<CompanyFooterThemeStyle> $style
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?string $unsubscribeText Empty when the localized default is used.
     */
    #[JsonProperty('unsubscribeText')]
    public ?string $unsubscribeText;

    /**
     * @param array{
     *   backgroundColor?: ?string,
     *   borderColor?: ?string,
     *   companyTextColor?: ?string,
     *   linkColor?: ?string,
     *   metaTextColor?: ?string,
     *   mode?: ?value-of<CompanyFooterThemeMode>,
     *   privacyPolicyText?: ?string,
     *   reasonText?: ?string,
     *   showCompanyLine?: ?bool,
     *   style?: ?value-of<CompanyFooterThemeStyle>,
     *   unsubscribeText?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backgroundColor = $values['backgroundColor'] ?? null;
        $this->borderColor = $values['borderColor'] ?? null;
        $this->companyTextColor = $values['companyTextColor'] ?? null;
        $this->linkColor = $values['linkColor'] ?? null;
        $this->metaTextColor = $values['metaTextColor'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->privacyPolicyText = $values['privacyPolicyText'] ?? null;
        $this->reasonText = $values['reasonText'] ?? null;
        $this->showCompanyLine = $values['showCompanyLine'] ?? null;
        $this->style = $values['style'] ?? null;
        $this->unsubscribeText = $values['unsubscribeText'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
