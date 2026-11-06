<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Colors and copy of the auto-added footer, the compliance footer Sequenzy appends when an email has no footer block. Merged into the stored theme: omitted fields keep their value, `null` (or `""`, and `"transparent"` for `backgroundColor`, the values get returns for defaults) resets one field to its default, and `footerTheme: null` resets them all. Other brandColors keys are kept. Malformed values and unknown fields return 400, as does a `style` that differs from `footerStyle` in the same request; a value that is not an object or null returns 422. Footer font, size and line height are set in `emailTheme.typography`.
 */
class UpdateCompaniesRequestFooterTheme extends JsonSerializableType
{
    /**
     * @var ?string $backgroundColor 6-digit hex, or `transparent` for the default (the email background).
     */
    #[JsonProperty('backgroundColor')]
    public ?string $backgroundColor;

    /**
     * @var ?string $borderColor 6-digit hex for the divider above the footer.
     */
    #[JsonProperty('borderColor')]
    public ?string $borderColor;

    /**
     * @var ?string $companyTextColor 6-digit hex for the company line.
     */
    #[JsonProperty('companyTextColor')]
    public ?string $companyTextColor;

    /**
     * @var ?string $linkColor 6-digit hex for the unsubscribe and privacy links.
     */
    #[JsonProperty('linkColor')]
    public ?string $linkColor;

    /**
     * @var ?string $metaTextColor 6-digit hex for the reason and address text.
     */
    #[JsonProperty('metaTextColor')]
    public ?string $metaTextColor;

    /**
     * @var ?string $privacyPolicyText Privacy link label. Empty or null uses the localized default.
     */
    #[JsonProperty('privacyPolicyText')]
    public ?string $privacyPolicyText;

    /**
     * @var ?string $reasonText Why the recipient gets the email. Empty or null uses the localized default.
     */
    #[JsonProperty('reasonText')]
    public ?string $reasonText;

    /**
     * @var ?bool $showCompanyLine Show the company name above the reason text. Default false.
     */
    #[JsonProperty('showCompanyLine')]
    public ?bool $showCompanyLine;

    /**
     * @var ?value-of<UpdateCompaniesRequestFooterThemeStyle> $style Same setting as `footerStyle`; `""` or `null` resets it to `auto`.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?string $unsubscribeText Unsubscribe link label. Empty or null uses the localized default.
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
     *   privacyPolicyText?: ?string,
     *   reasonText?: ?string,
     *   showCompanyLine?: ?bool,
     *   style?: ?value-of<UpdateCompaniesRequestFooterThemeStyle>,
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
