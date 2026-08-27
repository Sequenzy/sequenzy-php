<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IntegrationPixelStatePixel extends JsonSerializableType
{
    /**
     * @var ?bool $configurationCurrent Whether the endpoint and signed company, shop, and integration settings all match the current connection.
     */
    #[JsonProperty('configurationCurrent')]
    public ?bool $configurationCurrent;

    /**
     * @var ?string $endpoint Callback URL the installed pixel posts events to.
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?bool $endpointCurrent Whether the pixel posts to this account's canonical endpoint or the supported Shopify compatibility endpoint.
     */
    #[JsonProperty('endpointCurrent')]
    public ?bool $endpointCurrent;

    /**
     * @var ?string $error Set when Shopify could not be reached or refused the query. Distinct from "not installed" - the state is unknown.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?bool $healthy Installed, current, and confirmed by Shopify. Check this before relying on any on-site event.
     */
    #[JsonProperty('healthy')]
    public ?bool $healthy;

    /**
     * @var ?string $id Shopify's pixel ID.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $installed Whether a pixel for this app exists on the store.
     */
    #[JsonProperty('installed')]
    public ?bool $installed;

    /**
     * @param array{
     *   configurationCurrent?: ?bool,
     *   endpoint?: ?string,
     *   endpointCurrent?: ?bool,
     *   error?: ?string,
     *   healthy?: ?bool,
     *   id?: ?string,
     *   installed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->configurationCurrent = $values['configurationCurrent'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->endpointCurrent = $values['endpointCurrent'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->healthy = $values['healthy'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->installed = $values['installed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
