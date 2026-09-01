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
     * @var ?string $webhookUrl URL to configure in the provider's webhook settings with the same secret. Empty for Attio, which is outbound-only.
     */
    #[JsonProperty('webhookUrl')]
    public ?string $webhookUrl;

    /**
     * @param array{
     *   backfillQueued?: ?bool,
     *   history?: ?ConnectIntegrationsResponseHistory,
     *   integration?: ?IntegrationSummary,
     *   revenueSyncQueued?: ?bool,
     *   success?: ?bool,
     *   webhookUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->backfillQueued = $values['backfillQueued'] ?? null;
        $this->history = $values['history'] ?? null;
        $this->integration = $values['integration'] ?? null;
        $this->revenueSyncQueued = $values['revenueSyncQueued'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
