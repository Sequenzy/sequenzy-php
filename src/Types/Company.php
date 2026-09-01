<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\Union;

class Company extends JsonSerializableType
{
    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?array<string, mixed> $brandColors
     */
    #[JsonProperty('brandColors'), ArrayType(['string' => 'mixed'])]
    public ?array $brandColors;

    /**
     * @var ?string $companyContext
     */
    #[JsonProperty('companyContext')]
    public ?string $companyContext;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $defaultFromEmail
     */
    #[JsonProperty('defaultFromEmail')]
    public ?string $defaultFromEmail;

    /**
     * @var ?string $defaultFromName
     */
    #[JsonProperty('defaultFromName')]
    public ?string $defaultFromName;

    /**
     * @var ?string $defaultReplyProfileId
     */
    #[JsonProperty('defaultReplyProfileId')]
    public ?string $defaultReplyProfileId;

    /**
     * @var ?string $defaultReplyToEmail
     */
    #[JsonProperty('defaultReplyToEmail')]
    public ?string $defaultReplyToEmail;

    /**
     * @var ?string $defaultReplyToName
     */
    #[JsonProperty('defaultReplyToName')]
    public ?string $defaultReplyToName;

    /**
     * @var ?string $defaultSenderProfileId
     */
    #[JsonProperty('defaultSenderProfileId')]
    public ?string $defaultSenderProfileId;

    /**
     * @var ?array<string> $defaultSubscriberListIds Workspace default lists new contacts join when nothing targets them explicitly. null means every current and future list, [] means no list at all, and an array means exactly those lists.
     */
    #[JsonProperty('defaultSubscriberListIds'), ArrayType(['string'])]
    public ?array $defaultSubscriberListIds;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?CompanyEmailBranding $emailBranding Effective "Sent with Sequenzy" entitlement for future renders and sends. This is derived from the company owner's subscription and is not an editable footer field. Existing live sequences pick up an entitlement change without their stored email blocks changing.
     */
    #[JsonProperty('emailBranding')]
    public ?CompanyEmailBranding $emailBranding;

    /**
     * @var ?string $emailDesignPrompt Art direction for AI-designed emails: layout, density, which sections belong in an email, imagery, and CTA prominence. `toneVoice` steers copy; this steers design. When empty, the next email generation prefills it with the direction derived from the brand.
     */
    #[JsonProperty('emailDesignPrompt')]
    public ?string $emailDesignPrompt;

    /**
     * @var ?string $emailDirection
     */
    #[JsonProperty('emailDirection')]
    public ?string $emailDirection;

    /**
     * @var ?value-of<CompanyEmailLengthPreference> $emailLengthPreference How long AI-written email copy should be. New workspaces default to `concise`.
     */
    #[JsonProperty('emailLengthPreference')]
    public ?string $emailLengthPreference;

    /**
     * @var ?array<string, mixed> $emailLocalizationConfig
     */
    #[JsonProperty('emailLocalizationConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $emailLocalizationConfig;

    /**
     * @var ?array<string, mixed> $emailTheme
     */
    #[JsonProperty('emailTheme'), ArrayType(['string' => 'mixed'])]
    public ?array $emailTheme;

    /**
     * @var ?string $fontFamily
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?bool $forwardReplies Whether captured replies are forwarded to the configured mailbox.
     */
    #[JsonProperty('forwardReplies')]
    public ?bool $forwardReplies;

    /**
     * @var ?string $founderName
     */
    #[JsonProperty('founderName')]
    public ?string $founderName;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?string $logoUrl
     */
    #[JsonProperty('logoUrl')]
    public ?string $logoUrl;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewUrl Dashboard review/preview URL for this campaign.
     */
    #[JsonProperty('previewUrl')]
    public ?string $previewUrl;

    /**
     * @var ?array<string, mixed> $pricing
     */
    #[JsonProperty('pricing'), ArrayType(['string' => 'mixed'])]
    public ?array $pricing;

    /**
     * @var ?string $primaryColor
     */
    #[JsonProperty('primaryColor')]
    public ?string $primaryColor;

    /**
     * @var ?string $privacyPolicyUrl
     */
    #[JsonProperty('privacyPolicyUrl')]
    public ?string $privacyPolicyUrl;

    /**
     * @var ?int $replyRetentionDays Current reply retention period in days.
     */
    #[JsonProperty('replyRetentionDays')]
    public ?int $replyRetentionDays;

    /**
     * @var ?value-of<CompanyReplyTrackingDomainMode> $replyTrackingDomainMode Whether reply capture uses Sequenzy's managed inbound domain or a configured custom domain.
     */
    #[JsonProperty('replyTrackingDomainMode')]
    public ?string $replyTrackingDomainMode;

    /**
     * @var ?bool $replyTrackingEnabled Whether inbound reply capture is enabled for this company.
     */
    #[JsonProperty('replyTrackingEnabled')]
    public ?bool $replyTrackingEnabled;

    /**
     * @var ?array<string, ?string> $socialLinks
     */
    #[JsonProperty('socialLinks'), ArrayType(['string' => new Union('string', 'null')])]
    public ?array $socialLinks;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $termsUrl
     */
    #[JsonProperty('termsUrl')]
    public ?string $termsUrl;

    /**
     * @var ?array<array<string, mixed>> $testimonials
     */
    #[JsonProperty('testimonials'), ArrayType([['string' => 'mixed']])]
    public ?array $testimonials;

    /**
     * @var ?string $toneVoice
     */
    #[JsonProperty('toneVoice')]
    public ?string $toneVoice;

    /**
     * @var ?string $url Dashboard edit URL for this campaign.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?array<array<string, mixed>> $valueProps
     */
    #[JsonProperty('valueProps'), ArrayType([['string' => 'mixed']])]
    public ?array $valueProps;

    /**
     * @var ?string $websiteUrl
     */
    #[JsonProperty('websiteUrl')]
    public ?string $websiteUrl;

    /**
     * @param array{
     *   address?: ?string,
     *   brandColors?: ?array<string, mixed>,
     *   companyContext?: ?string,
     *   createdAt?: ?DateTime,
     *   defaultFromEmail?: ?string,
     *   defaultFromName?: ?string,
     *   defaultReplyProfileId?: ?string,
     *   defaultReplyToEmail?: ?string,
     *   defaultReplyToName?: ?string,
     *   defaultSenderProfileId?: ?string,
     *   defaultSubscriberListIds?: ?array<string>,
     *   description?: ?string,
     *   emailBranding?: ?CompanyEmailBranding,
     *   emailDesignPrompt?: ?string,
     *   emailDirection?: ?string,
     *   emailLengthPreference?: ?value-of<CompanyEmailLengthPreference>,
     *   emailLocalizationConfig?: ?array<string, mixed>,
     *   emailTheme?: ?array<string, mixed>,
     *   fontFamily?: ?string,
     *   forwardReplies?: ?bool,
     *   founderName?: ?string,
     *   id?: ?string,
     *   language?: ?string,
     *   logoUrl?: ?string,
     *   name?: ?string,
     *   previewUrl?: ?string,
     *   pricing?: ?array<string, mixed>,
     *   primaryColor?: ?string,
     *   privacyPolicyUrl?: ?string,
     *   replyRetentionDays?: ?int,
     *   replyTrackingDomainMode?: ?value-of<CompanyReplyTrackingDomainMode>,
     *   replyTrackingEnabled?: ?bool,
     *   socialLinks?: ?array<string, ?string>,
     *   status?: ?string,
     *   termsUrl?: ?string,
     *   testimonials?: ?array<array<string, mixed>>,
     *   toneVoice?: ?string,
     *   url?: ?string,
     *   valueProps?: ?array<array<string, mixed>>,
     *   websiteUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address = $values['address'] ?? null;
        $this->brandColors = $values['brandColors'] ?? null;
        $this->companyContext = $values['companyContext'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->defaultFromEmail = $values['defaultFromEmail'] ?? null;
        $this->defaultFromName = $values['defaultFromName'] ?? null;
        $this->defaultReplyProfileId = $values['defaultReplyProfileId'] ?? null;
        $this->defaultReplyToEmail = $values['defaultReplyToEmail'] ?? null;
        $this->defaultReplyToName = $values['defaultReplyToName'] ?? null;
        $this->defaultSenderProfileId = $values['defaultSenderProfileId'] ?? null;
        $this->defaultSubscriberListIds = $values['defaultSubscriberListIds'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->emailBranding = $values['emailBranding'] ?? null;
        $this->emailDesignPrompt = $values['emailDesignPrompt'] ?? null;
        $this->emailDirection = $values['emailDirection'] ?? null;
        $this->emailLengthPreference = $values['emailLengthPreference'] ?? null;
        $this->emailLocalizationConfig = $values['emailLocalizationConfig'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->forwardReplies = $values['forwardReplies'] ?? null;
        $this->founderName = $values['founderName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->logoUrl = $values['logoUrl'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewUrl = $values['previewUrl'] ?? null;
        $this->pricing = $values['pricing'] ?? null;
        $this->primaryColor = $values['primaryColor'] ?? null;
        $this->privacyPolicyUrl = $values['privacyPolicyUrl'] ?? null;
        $this->replyRetentionDays = $values['replyRetentionDays'] ?? null;
        $this->replyTrackingDomainMode = $values['replyTrackingDomainMode'] ?? null;
        $this->replyTrackingEnabled = $values['replyTrackingEnabled'] ?? null;
        $this->socialLinks = $values['socialLinks'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->termsUrl = $values['termsUrl'] ?? null;
        $this->testimonials = $values['testimonials'] ?? null;
        $this->toneVoice = $values['toneVoice'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->valueProps = $values['valueProps'] ?? null;
        $this->websiteUrl = $values['websiteUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
