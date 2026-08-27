<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * PostHog and Segment only. Outcome of the optional history import request.
 */
class ConnectIntegrationsResponseHistory extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?bool $queued
     */
    #[JsonProperty('queued')]
    public ?bool $queued;

    /**
     * @var ?bool $requested
     */
    #[JsonProperty('requested')]
    public ?bool $requested;

    /**
     * @param array{
     *   error?: ?string,
     *   queued?: ?bool,
     *   requested?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->queued = $values['queued'] ?? null;
        $this->requested = $values['requested'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
