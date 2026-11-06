<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushDeviceCounts extends JsonSerializableType
{
    /**
     * @var ?PushDeviceCountsActive $active
     */
    #[JsonProperty('active')]
    public ?PushDeviceCountsActive $active;

    /**
     * @var ?int $identifiedActive Active devices linked to a contact.
     */
    #[JsonProperty('identifiedActive')]
    public ?int $identifiedActive;

    /**
     * @var ?PushDeviceCountsPermissions $permissions Active iOS and Android devices by the notification permission the mobile SDK (or an API caller) last reported.
     */
    #[JsonProperty('permissions')]
    public ?PushDeviceCountsPermissions $permissions;

    /**
     * @var ?int $totalActive
     */
    #[JsonProperty('totalActive')]
    public ?int $totalActive;

    /**
     * @param array{
     *   active?: ?PushDeviceCountsActive,
     *   identifiedActive?: ?int,
     *   permissions?: ?PushDeviceCountsPermissions,
     *   totalActive?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->identifiedActive = $values['identifiedActive'] ?? null;
        $this->permissions = $values['permissions'] ?? null;
        $this->totalActive = $values['totalActive'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
