<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\WarehouseConnection;
use Sequenzy\Core\Json\JsonProperty;

class UpdateWarehouseConnectionResponse extends JsonSerializableType
{
    /**
     * @var ?WarehouseConnection $connection
     */
    #[JsonProperty('connection')]
    public ?WarehouseConnection $connection;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   connection?: ?WarehouseConnection,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->connection = $values['connection'] ?? null;
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
