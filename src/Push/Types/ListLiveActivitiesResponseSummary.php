<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Active tokens only, for the contact when one is given. A device that can start several types counts once in pushToStartDevices; several devices running one activity count as one activity.
 */
class ListLiveActivitiesResponseSummary extends JsonSerializableType
{
    /**
     * @var ?int $activeActivities
     */
    #[JsonProperty('activeActivities')]
    public ?int $activeActivities;

    /**
     * @var ?array<ListLiveActivitiesResponseSummaryActivityTypesItem> $activityTypes
     */
    #[JsonProperty('activityTypes'), ArrayType([ListLiveActivitiesResponseSummaryActivityTypesItem::class])]
    public ?array $activityTypes;

    /**
     * @var ?int $pushToStartDevices
     */
    #[JsonProperty('pushToStartDevices')]
    public ?int $pushToStartDevices;

    /**
     * @param array{
     *   activeActivities?: ?int,
     *   activityTypes?: ?array<ListLiveActivitiesResponseSummaryActivityTypesItem>,
     *   pushToStartDevices?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeActivities = $values['activeActivities'] ?? null;
        $this->activityTypes = $values['activityTypes'] ?? null;
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
