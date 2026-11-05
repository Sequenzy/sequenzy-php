<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Daytime window (contact's timezone) every send waits for.
 */
class SequenceTemplateSummaryQuietHours extends JsonSerializableType
{
    /**
     * @var ?string $endTime
     */
    #[JsonProperty('endTime')]
    public ?string $endTime;

    /**
     * @var ?string $startTime
     */
    #[JsonProperty('startTime')]
    public ?string $startTime;

    /**
     * @param array{
     *   endTime?: ?string,
     *   startTime?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->endTime = $values['endTime'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
