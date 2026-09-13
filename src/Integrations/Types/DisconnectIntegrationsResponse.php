<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DisconnectIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?string $cleanupWarning Null when cleanup succeeded or no managed webhook exists. Otherwise repeat disconnect to retry provider cleanup.
     */
    #[JsonProperty('cleanupWarning')]
    public ?string $cleanupWarning;

    /**
     * @var string $integrationId
     */
    #[JsonProperty('integrationId')]
    public string $integrationId;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var value-of<DisconnectIntegrationsResponseProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   integrationId: string,
     *   message: string,
     *   provider: value-of<DisconnectIntegrationsResponseProvider>,
     *   success: bool,
     *   cleanupWarning?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cleanupWarning = $values['cleanupWarning'] ?? null;
        $this->integrationId = $values['integrationId'];
        $this->message = $values['message'];
        $this->provider = $values['provider'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
