<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ListLiveActivitiesResponseSummaryActivityTypesItem extends JsonSerializableType
{
    /**
     * @var ?int $activeActivities
     */
    #[JsonProperty('activeActivities')]
    public ?int $activeActivities;

    /**
     * @var ?string $activityType
     */
    #[JsonProperty('activityType')]
    public ?string $activityType;

    /**
     * @var ?int $pushToStartDevices
     */
    #[JsonProperty('pushToStartDevices')]
    public ?int $pushToStartDevices;

    /**
     * @param array{
     *   activeActivities?: ?int,
     *   activityType?: ?string,
     *   pushToStartDevices?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeActivities = $values['activeActivities'] ?? null;
        $this->activityType = $values['activityType'] ?? null;
        $this->pushToStartDevices = $values['pushToStartDevices'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
