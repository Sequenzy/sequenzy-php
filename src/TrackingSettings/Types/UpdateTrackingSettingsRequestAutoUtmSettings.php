<?php

namespace Sequenzy\TrackingSettings\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * UTM templates merged over the stored ones. Null resets every parameter to the platform defaults; a null field stops that parameter being emitted.
 */
class UpdateTrackingSettingsRequestAutoUtmSettings extends JsonSerializableType
{
    /**
     * @var ?string $campaign
     */
    #[JsonProperty('campaign')]
    public ?string $campaign;

    /**
     * @var ?string $content
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?string $medium
     */
    #[JsonProperty('medium')]
    public ?string $medium;

    /**
     * @var ?string $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?string $term
     */
    #[JsonProperty('term')]
    public ?string $term;

    /**
     * @param array{
     *   campaign?: ?string,
     *   content?: ?string,
     *   medium?: ?string,
     *   source?: ?string,
     *   term?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->medium = $values['medium'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->term = $values['term'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
