<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GeofenceInput extends JsonSerializableType
{
    /**
     * @var ?bool $active
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @var ?int $cooldownSeconds
     */
    #[JsonProperty('cooldownSeconds')]
    public ?int $cooldownSeconds;

    /**
     * @var ?int $dwellSeconds Record app.geofence_dwelled after this long inside. null turns dwell off.
     */
    #[JsonProperty('dwellSeconds')]
    public ?int $dwellSeconds;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $group
     */
    #[JsonProperty('group')]
    public ?string $group;

    /**
     * @var ?float $latitude
     */
    #[JsonProperty('latitude')]
    public ?float $latitude;

    /**
     * @var ?float $longitude
     */
    #[JsonProperty('longitude')]
    public ?float $longitude;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $radiusMeters
     */
    #[JsonProperty('radiusMeters')]
    public ?int $radiusMeters;

    /**
     * @param array{
     *   active?: ?bool,
     *   cooldownSeconds?: ?int,
     *   dwellSeconds?: ?int,
     *   externalId?: ?string,
     *   group?: ?string,
     *   latitude?: ?float,
     *   longitude?: ?float,
     *   name?: ?string,
     *   radiusMeters?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->cooldownSeconds = $values['cooldownSeconds'] ?? null;
        $this->dwellSeconds = $values['dwellSeconds'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->group = $values['group'] ?? null;
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->radiusMeters = $values['radiusMeters'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
