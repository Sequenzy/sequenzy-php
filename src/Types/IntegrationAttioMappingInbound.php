<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Inbound sync health.
 */
class IntegrationAttioMappingInbound extends JsonSerializableType
{
    /**
     * @var ?bool $enabled True when at least one Attio list pulls into Sequenzy.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $error What to fix when status is error.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?value-of<IntegrationAttioMappingInboundStatus> $status off without inbound mappings, active when the Attio webhook is set up, error otherwise.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $webhookUrl URL Sequenzy registers in Attio. Never needs manual configuration.
     */
    #[JsonProperty('webhookUrl')]
    public ?string $webhookUrl;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   error?: ?string,
     *   status?: ?value-of<IntegrationAttioMappingInboundStatus>,
     *   webhookUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->status = $values['status'] ?? null;
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
