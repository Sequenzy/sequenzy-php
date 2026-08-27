<?php

namespace Sequenzy\WebTrackingKeys\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateWebTrackingKeysRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $allowedOrigins Replacement allowlist. Pass an empty array to make the key unrestricted.
     */
    #[JsonProperty('allowedOrigins'), ArrayType(['string'])]
    public ?array $allowedOrigins;

    /**
     * @var ?bool $isActive Set false to revoke the key, true to re-enable a revoked one.
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   allowedOrigins?: ?array<string>,
     *   isActive?: ?bool,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowedOrigins = $values['allowedOrigins'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
