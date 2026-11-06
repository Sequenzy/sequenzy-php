<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateAmplitudeSettingsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $eventAllowlist Amplitude event types to record when syncAllEvents is false. Replaces the saved list. Names are trimmed and deduplicated; an empty list with syncAllEvents false is rejected.
     */
    #[JsonProperty('eventAllowlist'), ArrayType(['string'])]
    public ?array $eventAllowlist;

    /**
     * @var ?bool $skipInternalEvents Skip session, [Amplitude] autocapture, and other $ events unless allowlisted.
     */
    #[JsonProperty('skipInternalEvents')]
    public ?bool $skipInternalEvents;

    /**
     * @var ?bool $syncAllEvents true records every event type; false records only eventAllowlist.
     */
    #[JsonProperty('syncAllEvents')]
    public ?bool $syncAllEvents;

    /**
     * @param array{
     *   eventAllowlist?: ?array<string>,
     *   skipInternalEvents?: ?bool,
     *   syncAllEvents?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventAllowlist = $values['eventAllowlist'] ?? null;
        $this->skipInternalEvents = $values['skipInternalEvents'] ?? null;
        $this->syncAllEvents = $values['syncAllEvents'] ?? null;
    }
}
