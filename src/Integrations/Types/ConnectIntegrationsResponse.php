<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\IntegrationSummary;

class ConnectIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $backfillQueued Affonso only. Whether the affiliate backfill was queued.
     */
    #[JsonProperty('backfillQueued')]
    public ?bool $backfillQueued;

    /**
     * @var ?ConnectIntegrationsResponseHistory $history PostHog and Segment only. Outcome of the optional history import request.
     */
    #[JsonProperty('history')]
    public ?ConnectIntegrationsResponseHistory $history;

    /**
     * @var ?IntegrationSummary $integration
     */
    #[JsonProperty('integration')]
    public ?IntegrationSummary $integration;

    /**
     * @var ?ConnectIntegrationsResponsePublication $publication SparkLoop only. The publication whose partner referrals this workspace receives.
     */
    #[JsonProperty('publication')]
    public ?ConnectIntegrationsResponsePublication $publication;

    /**
     * @var ?bool $revenueSyncQueued Payment providers only. Whether the initial revenue backfill was queued.
     */
    #[JsonProperty('revenueSyncQueued')]
    public ?bool $revenueSyncQueued;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $testMode Lemon Squeezy only. Whether the connected store uses test mode.
     */
    #[JsonProperty('testMode')]
    public ?bool $testMode;

    /**
     * @var ?value-of<ConnectIntegrationsResponseWebhookProvisioning> $webhookProvisioning Lemon Squeezy only. Whether Sequenzy manages the provider webhook.
     */
    #[JsonProperty('webhookProvisioning')]
    public ?string $webhookProvisioning;

    /**
     * @var ?string $webhookUrl Provider webhook URL. Lemon Squeezy managed mode installs it automatically; manual mode uses the supplied secret. SparkLoop's is already registered in SparkLoop. Empty for Attio.
     */
    #[JsonProperty('webhookUrl')]
    public ?string $webhookUrl;

    /**
     * @var ?ConnectIntegrationsResponseWebsiteTypeSuggestion $websiteTypeSuggestion RevenueCat, Superwall and Adapty only, when the company category is not already `mobile_app` and was not chosen by a user (`websiteTypeSource` is not `user`). A suggestion to apply with [Update Company](/api-reference/companies/update) (`websiteType`); nothing is changed.
     */
    #[JsonProperty('websiteTypeSuggestion')]
    public ?ConnectIntegrationsResponseWebsiteTypeSuggestion $websiteTypeSuggestion;

    /**
     * @param array{
     *   backfillQueued?: ?bool,
     *   history?: ?ConnectIntegrationsResponseHistory,
     *   integration?: ?IntegrationSummary,
     *   publication?: ?ConnectIntegrationsResponsePublication,
     *   revenueSyncQueued?: ?bool,
     *   success?: ?bool,
     *   testMode?: ?bool,
     *   webhookProvisioning?: ?value-of<ConnectIntegrationsResponseWebhookProvisioning>,
     *   webhookUrl?: ?string,
     *   websiteTypeSuggestion?: ?ConnectIntegrationsResponseWebsiteTypeSuggestion,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backfillQueued = $values['backfillQueued'] ?? null;
        $this->history = $values['history'] ?? null;
        $this->integration = $values['integration'] ?? null;
        $this->publication = $values['publication'] ?? null;
        $this->revenueSyncQueued = $values['revenueSyncQueued'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->testMode = $values['testMode'] ?? null;
        $this->webhookProvisioning = $values['webhookProvisioning'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->websiteTypeSuggestion = $values['websiteTypeSuggestion'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
