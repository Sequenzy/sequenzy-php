<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Effective "Sent with Sequenzy" entitlement for future renders and sends. This is derived from the company owner's subscription and is not an editable footer field. Existing live sequences pick up an entitlement change without their stored email blocks changing.
 */
class CompanyEmailBranding extends JsonSerializableType
{
    /**
     * @var value-of<CompanyEmailBrandingManagedBy> $managedBy
     */
    #[JsonProperty('managedBy')]
    public string $managedBy;

    /**
     * @var value-of<CompanyEmailBrandingReason> $reason
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var value-of<CompanyEmailBrandingRemovalAction> $removalAction
     */
    #[JsonProperty('removalAction')]
    public string $removalAction;

    /**
     * @var bool $removalEntitled Whether the current owner subscription removes branding.
     */
    #[JsonProperty('removalEntitled')]
    public bool $removalEntitled;

    /**
     * @var ?value-of<CompanyEmailBrandingSubscriptionStatus> $subscriptionStatus
     */
    #[JsonProperty('subscriptionStatus')]
    public ?string $subscriptionStatus;

    /**
     * @var ?value-of<CompanyEmailBrandingSubscriptionTier> $subscriptionTier
     */
    #[JsonProperty('subscriptionTier')]
    public ?string $subscriptionTier;

    /**
     * @var string $subscriptionUrl Owner-facing subscription, upgrade, and billing-management page.
     */
    #[JsonProperty('subscriptionUrl')]
    public string $subscriptionUrl;

    /**
     * @var bool $visible Whether Sequenzy branding is added to outgoing email.
     */
    #[JsonProperty('visible')]
    public bool $visible;

    /**
     * @param array{
     *   managedBy: value-of<CompanyEmailBrandingManagedBy>,
     *   reason: value-of<CompanyEmailBrandingReason>,
     *   removalAction: value-of<CompanyEmailBrandingRemovalAction>,
     *   removalEntitled: bool,
     *   subscriptionUrl: string,
     *   visible: bool,
     *   subscriptionStatus?: ?value-of<CompanyEmailBrandingSubscriptionStatus>,
     *   subscriptionTier?: ?value-of<CompanyEmailBrandingSubscriptionTier>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->managedBy = $values['managedBy'];
        $this->reason = $values['reason'];
        $this->removalAction = $values['removalAction'];
        $this->removalEntitled = $values['removalEntitled'];
        $this->subscriptionStatus = $values['subscriptionStatus'] ?? null;
        $this->subscriptionTier = $values['subscriptionTier'] ?? null;
        $this->subscriptionUrl = $values['subscriptionUrl'];
        $this->visible = $values['visible'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
