<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\IntegrationProviderCapability;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListCapabilitiesIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<IntegrationProviderCapability> $providers
     */
    #[JsonProperty('providers'), ArrayType([IntegrationProviderCapability::class])]
    public ?array $providers;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   providers?: ?array<IntegrationProviderCapability>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->providers = $values['providers'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
