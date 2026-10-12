<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetInAppStepStatsResponse extends JsonSerializableType
{
    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?GetInAppStepStatsResponseStats $stats
     */
    #[JsonProperty('stats')]
    public ?GetInAppStepStatsResponseStats $stats;

    /**
     * @var ?string $stepId
     */
    #[JsonProperty('stepId')]
    public ?string $stepId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   sequenceId?: ?string,
     *   stats?: ?GetInAppStepStatsResponseStats,
     *   stepId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->stepId = $values['stepId'] ?? null;
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
