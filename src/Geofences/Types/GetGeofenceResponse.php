<?php

namespace Sequenzy\Geofences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Geofence;
use Sequenzy\Core\Json\JsonProperty;

class GetGeofenceResponse extends JsonSerializableType
{
    /**
     * @var ?Geofence $geofence
     */
    #[JsonProperty('geofence')]
    public ?Geofence $geofence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   geofence?: ?Geofence,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->geofence = $values['geofence'] ?? null;
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
