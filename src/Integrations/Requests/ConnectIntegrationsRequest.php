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
     * @var ?string $apiKey Provider API key. Required for every provider except clerk, posthog, and segment.
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
     * @var ?string $providerAccountId Provider account id: Paddle seller ID, Dodo business ID, Whop company ID, Creem store ID, or Chargebee site name. Polar resolves it from the API key.
     */
    #[JsonProperty('providerAccountId')]
    public ?string $providerAccountId;

    /**
     * @var ?ConnectIntegrationsRequestSettings $settings PostHog and Segment only. Event delivery scope. PostHog defaults to every non-internal event; new Segment connections skip automatic page/screen calls unless explicitly allowlisted.
     */
    #[JsonProperty('settings')]
    public ?ConnectIntegrationsRequestSettings $settings;

    /**
     * @var string $webhookSecret Signing secret of the webhook created at the provider. For Chargebee, the webhook's basic-auth credentials as username:password. For Segment, the secret is your own choice and must be between 16 and 153 UTF-8 bytes.
     */
    #[JsonProperty('webhookSecret')]
    public string $webhookSecret;

    /**
     * @param array{
     *   provider: value-of<ConnectIntegrationsRequestProvider>,
     *   webhookSecret: string,
     *   apiKey?: ?string,
     *   historyImport?: ?ConnectIntegrationsRequestHistoryImport,
     *   providerAccountId?: ?string,
     *   settings?: ?ConnectIntegrationsRequestSettings,
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
        $this->webhookSecret = $values['webhookSecret'];
    }
}
