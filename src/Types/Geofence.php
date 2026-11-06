<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class Geofence extends JsonSerializableType
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
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?int $dwellSeconds
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
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

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
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   active?: ?bool,
     *   cooldownSeconds?: ?int,
     *   createdAt?: ?DateTime,
     *   dwellSeconds?: ?int,
     *   externalId?: ?string,
     *   group?: ?string,
     *   id?: ?string,
     *   latitude?: ?float,
     *   longitude?: ?float,
     *   name?: ?string,
     *   radiusMeters?: ?int,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->cooldownSeconds = $values['cooldownSeconds'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->dwellSeconds = $values['dwellSeconds'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->group = $values['group'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->radiusMeters = $values['radiusMeters'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
