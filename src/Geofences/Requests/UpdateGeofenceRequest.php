<?php

namespace Sequenzy\Geofences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\GeofenceInput;

class UpdateGeofenceRequest extends JsonSerializableType
{
    /**
     * @var GeofenceInput $body
     */
    public GeofenceInput $body;

    /**
     * @param array{
     *   body: GeofenceInput,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
