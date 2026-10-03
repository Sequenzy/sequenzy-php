<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class WarehouseConnection extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $config Non-secret settings. BigQuery also includes serviceAccountEmail.
     */
    #[JsonProperty('config'), ArrayType(['string' => 'mixed'])]
    public ?array $config;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $lastError
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?DateTime $lastTestedAt
     */
    #[JsonProperty('lastTestedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastTestedAt;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<WarehouseConnectionProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?value-of<WarehouseConnectionStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $syncCount
     */
    #[JsonProperty('syncCount')]
    public ?int $syncCount;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   config?: ?array<string, mixed>,
     *   createdAt?: ?DateTime,
     *   id?: ?string,
     *   lastError?: ?string,
     *   lastTestedAt?: ?DateTime,
     *   name?: ?string,
     *   provider?: ?value-of<WarehouseConnectionProvider>,
     *   status?: ?value-of<WarehouseConnectionStatus>,
     *   syncCount?: ?int,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->config = $values['config'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->lastTestedAt = $values['lastTestedAt'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->syncCount = $values['syncCount'] ?? null;
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
