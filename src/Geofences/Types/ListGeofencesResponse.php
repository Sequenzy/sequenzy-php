<?php

namespace Sequenzy\Geofences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Geofence;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListGeofencesResponse extends JsonSerializableType
{
    /**
     * @var ?array<Geofence> $geofences
     */
    #[JsonProperty('geofences'), ArrayType([Geofence::class])]
    public ?array $geofences;

    /**
     * @var ?string $nextCursor
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   geofences?: ?array<Geofence>,
     *   nextCursor?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->geofences = $values['geofences'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
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
