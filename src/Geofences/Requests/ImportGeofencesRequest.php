<?php

namespace Sequenzy\Geofences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\GeofenceInput;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ImportGeofencesRequest extends JsonSerializableType
{
    /**
     * @var array<GeofenceInput> $geofences
     */
    #[JsonProperty('geofences'), ArrayType([GeofenceInput::class])]
    public array $geofences;

    /**
     * @param array{
     *   geofences: array<GeofenceInput>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->geofences = $values['geofences'];
    }
}
