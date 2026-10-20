<?php

namespace Sequenzy\WebTrackingKeys\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateWebTrackingKeysRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $allowedAppIds Replacement list of iOS bundle IDs and Android package names.
     */
    #[JsonProperty('allowedAppIds'), ArrayType(['string'])]
    public ?array $allowedAppIds;

    /**
     * @var ?array<string> $allowedOrigins Replacement origin allowlist. The key becomes unrestricted when both this and allowedAppIds are empty.
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
     *   allowedAppIds?: ?array<string>,
     *   allowedOrigins?: ?array<string>,
     *   isActive?: ?bool,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowedAppIds = $values['allowedAppIds'] ?? null;
        $this->allowedOrigins = $values['allowedOrigins'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
