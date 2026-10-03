<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateWarehouseConnectionRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $config Settings to change; merged with the saved settings.
     */
    #[JsonProperty('config'), ArrayType(['string' => 'mixed'])]
    public ?array $config;

    /**
     * @var ?array<string, mixed> $credentials Replacement credentials. Omit to keep the stored ones.
     */
    #[JsonProperty('credentials'), ArrayType(['string' => 'mixed'])]
    public ?array $credentials;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   config?: ?array<string, mixed>,
     *   credentials?: ?array<string, mixed>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->config = $values['config'] ?? null;
        $this->credentials = $values['credentials'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
