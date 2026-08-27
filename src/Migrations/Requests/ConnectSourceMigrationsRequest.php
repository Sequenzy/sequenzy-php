<?php

namespace Sequenzy\Migrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ConnectSourceMigrationsRequest extends JsonSerializableType
{
    /**
     * @var string $credential Provider API credential.
     */
    #[JsonProperty('credential')]
    public string $credential;

    /**
     * @var string $provider Provider adapter ID. Supported values include `active-campaign`, `brevo`, `constant-contact`, `customer-io`, `drip`, `hubspot`, `kit`, `klaviyo`, `loops`, `mailchimp`, `mailerlite`, `mailjet`, `omnisend`, `resend`, and `sendgrid`.
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var ?string $providerLabel Optional display label for manual providers.
     */
    #[JsonProperty('providerLabel')]
    public ?string $providerLabel;

    /**
     * @param array{
     *   credential: string,
     *   provider: string,
     *   providerLabel?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->credential = $values['credential'];
        $this->provider = $values['provider'];
        $this->providerLabel = $values['providerLabel'] ?? null;
    }
}
