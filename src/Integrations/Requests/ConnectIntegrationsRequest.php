<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Integrations\Types\ConnectIntegrationsRequestHistoryImport;
use Sequenzy\Integrations\Types\ConnectIntegrationsRequestProvider;
use Sequenzy\Integrations\Types\ConnectIntegrationsRequestSettings;

class ConnectIntegrationsRequest extends JsonSerializableType
{
    /**
     * @var ?string $apiKey Provider API key. Required for polar, paddle, dodo, lemon_squeezy, whop, creem, chargebee, affonso, and attio. Attio uses the workspace access token.
     */
    #[JsonProperty('apiKey')]
    public ?string $apiKey;

    /**
     * @var ?ConnectIntegrationsRequestHistoryImport $historyImport PostHog and Segment only. Imports event history after connecting: PostHog reads the project archive (projectId + personalApiKey); Segment walks your existing contacts' Unify profiles (spaceId + profileApiToken) and covers at most the last 14 days the Profile API serves, because Segment has no bulk event export.
     */
    #[JsonProperty('historyImport')]
    public ?ConnectIntegrationsRequestHistoryImport $historyImport;

    /**
     * @var value-of<ConnectIntegrationsRequestProvider> $provider Provider to connect.
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var ?string $providerAccountId Provider account id: Paddle seller ID, Dodo business ID, Lemon Squeezy numeric store ID, Whop company ID, Creem store ID, or Chargebee site name. Polar resolves it from the API key.
     */
    #[JsonProperty('providerAccountId')]
    public ?string $providerAccountId;

    /**
     * @var ?ConnectIntegrationsRequestSettings $settings PostHog and Segment: event delivery scope. Attio: listMap (Sequenzy list id to Attio list id or slug) and syncCompanyFromDomain.
     */
    #[JsonProperty('settings')]
    public ?ConnectIntegrationsRequestSettings $settings;

    /**
     * @var ?string $webhookSecret Signing secret of the provider webhook. Optional for lemon_squeezy managed provisioning and outbound-only attio; required for other providers. Lemon Squeezy manual secrets use 16-40 characters. For Chargebee, pass username:password. For Segment, use 16-153 UTF-8 bytes.
     */
    #[JsonProperty('webhookSecret')]
    public ?string $webhookSecret;

    /**
     * @param array{
     *   provider: value-of<ConnectIntegrationsRequestProvider>,
     *   apiKey?: ?string,
     *   historyImport?: ?ConnectIntegrationsRequestHistoryImport,
     *   providerAccountId?: ?string,
     *   settings?: ?ConnectIntegrationsRequestSettings,
     *   webhookSecret?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiKey = $values['apiKey'] ?? null;
        $this->historyImport = $values['historyImport'] ?? null;
        $this->provider = $values['provider'];
        $this->providerAccountId = $values['providerAccountId'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->webhookSecret = $values['webhookSecret'] ?? null;
    }
}
