<?php

namespace Sequenzy\Companies\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Companies\Types\UpdateCompaniesRequestEmailDirection;
use Sequenzy\Companies\Types\UpdateCompaniesRequestEmailLengthPreference;
use Sequenzy\Companies\Types\UpdateCompaniesRequestEmailTheme;
use Sequenzy\Companies\Types\UpdateCompaniesRequestReplyTrackingDomainMode;
use Sequenzy\Core\Types\Union;

class UpdateCompaniesRequest extends JsonSerializableType
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
     * @var ?array<string> $defaultSubscriberListIds Which lists new contacts join when something creates a subscriber without explicit list targeting - forms, API writes, events, tag actions, imports, and any integration without its own list targeting. null means every current and future list, [] means no list at all, and an array means exactly those lists. Unknown or foreign list IDs are rejected rather than skipped. Applies only to later writes; nobody is moved or removed retroactively. Requires the companies:manage scope.
     */
    #[JsonProperty('defaultSubscriberListIds'), ArrayType(['string'])]
    public ?array $defaultSubscriberListIds;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $emailDesignPrompt Art direction for AI-designed emails: layout, density, which sections belong in an email, imagery, and CTA prominence. `toneVoice` steers copy; this steers design. When empty, the next email generation prefills it with the direction derived from the brand; null clears it so the next generation writes a fresh one.
     */
    #[JsonProperty('emailDesignPrompt')]
    public ?string $emailDesignPrompt;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailDirection> $emailDirection
     */
    #[JsonProperty('emailDirection')]
    public ?string $emailDirection;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailLengthPreference> $emailLengthPreference How long AI-written email copy should be. New workspaces default to `concise`.
     */
    #[JsonProperty('emailLengthPreference')]
    public ?string $emailLengthPreference;

    /**
     * @var ?UpdateCompaniesRequestEmailTheme $emailTheme Default email theme. Partial update - omitted fields keep their current value (or the preset default) and numeric values are clamped to supported ranges. Pass null to reset to the platform default theme.
     */
    #[JsonProperty('emailTheme')]
    public ?UpdateCompaniesRequestEmailTheme $emailTheme;

    /**
     * @var ?string $fontFamily
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?bool $forwardReplies Enable or disable forwarding captured replies to the configured mailbox.
     */
    #[JsonProperty('forwardReplies')]
    public ?bool $forwardReplies;

    /**
     * @var ?string $founderName
     */
    #[JsonProperty('founderName')]
    public ?string $founderName;

    /**
     * @var ?string $fromEmail Account-wide default From address. The domain must be configured and verified.
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName Display name of the default From profile. Sent on its own it renames the current default profile; with senderProfileId it renames that profile; with fromEmail it names the profile for that address. If the address already carries several display names, the request is rejected - pass senderProfileId to say which one to rename.
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

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
     * @var ?array<string, mixed> $pricing
     */
    #[JsonProperty('pricing'), ArrayType(['string' => 'mixed'])]
    public ?array $pricing;

    /**
     * @var ?string $primaryColor 6-digit hex color, for example
     */
    #[JsonProperty('primaryColor')]
    public ?string $primaryColor;

    /**
     * @var ?string $privacyPolicyUrl
     */
    #[JsonProperty('privacyPolicyUrl')]
    public ?string $privacyPolicyUrl;

    /**
     * @var ?string $replyProfileId Existing reply profile to make the account-wide default, and the profile replyToName renames. Mutually exclusive with replyTo.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Account-wide default Reply-To address. A reply profile is created when needed.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Display name of the default Reply-To profile. Sent on its own it renames the current default profile; with replyProfileId it renames that profile; with replyTo it names the profile for that address.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?value-of<UpdateCompaniesRequestReplyTrackingDomainMode> $replyTrackingDomainMode Use Sequenzy's managed inbound domain or a configured custom domain.
     */
    #[JsonProperty('replyTrackingDomainMode')]
    public ?string $replyTrackingDomainMode;

    /**
     * @var ?bool $replyTrackingEnabled Enable or disable inbound reply capture.
     */
    #[JsonProperty('replyTrackingEnabled')]
    public ?bool $replyTrackingEnabled;

    /**
     * @var ?string $senderProfileId Existing sender profile to make the account-wide default, and the profile fromName renames. List IDs with GET /v1/sender-profiles. Mutually exclusive with fromEmail.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?array<string, ?string> $socialLinks
     */
    #[JsonProperty('socialLinks'), ArrayType(['string' => new Union('string', 'null')])]
    public ?array $socialLinks;

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
     * @var ?array<array<string, mixed>> $valueProps
     */
    #[JsonProperty('valueProps'), ArrayType([['string' => 'mixed']])]
    public ?array $valueProps;

    /**
     * @param array{
     *   address?: ?string,
     *   brandColors?: ?array<string, mixed>,
     *   companyContext?: ?string,
     *   defaultSubscriberListIds?: ?array<string>,
     *   description?: ?string,
     *   emailDesignPrompt?: ?string,
     *   emailDirection?: ?value-of<UpdateCompaniesRequestEmailDirection>,
     *   emailLengthPreference?: ?value-of<UpdateCompaniesRequestEmailLengthPreference>,
     *   emailTheme?: ?UpdateCompaniesRequestEmailTheme,
     *   fontFamily?: ?string,
     *   forwardReplies?: ?bool,
     *   founderName?: ?string,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   language?: ?string,
     *   logoUrl?: ?string,
     *   name?: ?string,
     *   pricing?: ?array<string, mixed>,
     *   primaryColor?: ?string,
     *   privacyPolicyUrl?: ?string,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   replyTrackingDomainMode?: ?value-of<UpdateCompaniesRequestReplyTrackingDomainMode>,
     *   replyTrackingEnabled?: ?bool,
     *   senderProfileId?: ?string,
     *   socialLinks?: ?array<string, ?string>,
     *   termsUrl?: ?string,
     *   testimonials?: ?array<array<string, mixed>>,
     *   toneVoice?: ?string,
     *   valueProps?: ?array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address = $values['address'] ?? null;
        $this->brandColors = $values['brandColors'] ?? null;
        $this->companyContext = $values['companyContext'] ?? null;
        $this->defaultSubscriberListIds = $values['defaultSubscriberListIds'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->emailDesignPrompt = $values['emailDesignPrompt'] ?? null;
        $this->emailDirection = $values['emailDirection'] ?? null;
        $this->emailLengthPreference = $values['emailLengthPreference'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->forwardReplies = $values['forwardReplies'] ?? null;
        $this->founderName = $values['founderName'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->logoUrl = $values['logoUrl'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->pricing = $values['pricing'] ?? null;
        $this->primaryColor = $values['primaryColor'] ?? null;
        $this->privacyPolicyUrl = $values['privacyPolicyUrl'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->replyTrackingDomainMode = $values['replyTrackingDomainMode'] ?? null;
        $this->replyTrackingEnabled = $values['replyTrackingEnabled'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->socialLinks = $values['socialLinks'] ?? null;
        $this->termsUrl = $values['termsUrl'] ?? null;
        $this->testimonials = $values['testimonials'] ?? null;
        $this->toneVoice = $values['toneVoice'] ?? null;
        $this->valueProps = $values['valueProps'] ?? null;
    }
}
