<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\WarehouseConnection;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListWarehouseConnectionsResponse extends JsonSerializableType
{
    /**
     * @var ?array<WarehouseConnection> $connections
     */
    #[JsonProperty('connections'), ArrayType([WarehouseConnection::class])]
    public ?array $connections;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   connections?: ?array<WarehouseConnection>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->connections = $values['connections'] ?? null;
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
