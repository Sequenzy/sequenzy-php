<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateAmplitudeSettingsResponseEventSettings extends JsonSerializableType
{
    /**
     * @var array<string> $eventAllowlist
     */
    #[JsonProperty('eventAllowlist'), ArrayType(['string'])]
    public array $eventAllowlist;

    /**
     * @var bool $skipInternalEvents
     */
    #[JsonProperty('skipInternalEvents')]
    public bool $skipInternalEvents;

    /**
     * @var bool $syncAllEvents
     */
    #[JsonProperty('syncAllEvents')]
    public bool $syncAllEvents;

    /**
     * @param array{
     *   eventAllowlist: array<string>,
     *   skipInternalEvents: bool,
     *   syncAllEvents: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventAllowlist = $values['eventAllowlist'];
        $this->skipInternalEvents = $values['skipInternalEvents'];
        $this->syncAllEvents = $values['syncAllEvents'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
