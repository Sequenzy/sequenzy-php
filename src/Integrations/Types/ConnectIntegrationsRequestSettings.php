<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * PostHog and Segment only. Event delivery scope. PostHog defaults to every non-internal event; new Segment connections skip automatic page/screen calls unless explicitly allowlisted.
 */
class ConnectIntegrationsRequestSettings extends JsonSerializableType
{
    /**
     * @var ?array<string> $eventAllowlist
     */
    #[JsonProperty('eventAllowlist'), ArrayType(['string'])]
    public ?array $eventAllowlist;

    /**
     * @var ?bool $syncAllEvents
     */
    #[JsonProperty('syncAllEvents')]
    public ?bool $syncAllEvents;

    /**
     * @param array{
     *   eventAllowlist?: ?array<string>,
     *   syncAllEvents?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventAllowlist = $values['eventAllowlist'] ?? null;
        $this->syncAllEvents = $values['syncAllEvents'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
