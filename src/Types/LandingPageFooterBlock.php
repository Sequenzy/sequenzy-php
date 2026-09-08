<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageFooterBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?string $brandText
     */
    #[JsonProperty('brandText')]
    public ?string $brandText;

    /**
     * @var ?string $privacyLabel
     */
    #[JsonProperty('privacyLabel')]
    public ?string $privacyLabel;

    /**
     * @var ?string $privacyUrl
     */
    #[JsonProperty('privacyUrl')]
    public ?string $privacyUrl;

    /**
     * @var ?bool $showBrandText
     */
    #[JsonProperty('showBrandText')]
    public ?bool $showBrandText;

    /**
     * @var ?bool $showPrivacyLink
     */
    #[JsonProperty('showPrivacyLink')]
    public ?bool $showPrivacyLink;

    /**
     * @var ?bool $showTermsLink
     */
    #[JsonProperty('showTermsLink')]
    public ?bool $showTermsLink;

    /**
     * @var value-of<LandingPageFooterBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var ?string $termsLabel
     */
    #[JsonProperty('termsLabel')]
    public ?string $termsLabel;

    /**
     * @var ?string $termsUrl
     */
    #[JsonProperty('termsUrl')]
    public ?string $termsUrl;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageFooterBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   brandText?: ?string,
     *   privacyLabel?: ?string,
     *   privacyUrl?: ?string,
     *   showBrandText?: ?bool,
     *   showPrivacyLink?: ?bool,
     *   showTermsLink?: ?bool,
     *   termsLabel?: ?string,
     *   termsUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->sectionAlign = $values['sectionAlign'] ?? null;
        $this->sectionId = $values['sectionId'] ?? null;
        $this->sectionKind = $values['sectionKind'] ?? null;
        $this->sectionLabel = $values['sectionLabel'] ?? null;
        $this->sectionLayout = $values['sectionLayout'] ?? null;
        $this->sectionVariant = $values['sectionVariant'] ?? null;
        $this->brandText = $values['brandText'] ?? null;
        $this->privacyLabel = $values['privacyLabel'] ?? null;
        $this->privacyUrl = $values['privacyUrl'] ?? null;
        $this->showBrandText = $values['showBrandText'] ?? null;
        $this->showPrivacyLink = $values['showPrivacyLink'] ?? null;
        $this->showTermsLink = $values['showTermsLink'] ?? null;
        $this->slot = $values['slot'];
        $this->termsLabel = $values['termsLabel'] ?? null;
        $this->termsUrl = $values['termsUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
