<?php

namespace Sequenzy\WebTrackingKeys\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateWebTrackingKeysRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $allowedAppIds iOS bundle IDs and Android package names allowed to use this key from the mobile SDKs, e.g. com.example.app. Duplicates are dropped case-insensitively.
     */
    #[JsonProperty('allowedAppIds'), ArrayType(['string'])]
    public ?array $allowedAppIds;

    /**
     * @var ?array<string> $allowedOrigins Origins allowed to use this key. A bare domain is read as https. A leading *. matches subdomains at any depth but not the apex. Omitting this and allowedAppIds leaves the key unrestricted.
     */
    #[JsonProperty('allowedOrigins'), ArrayType(['string'])]
    public ?array $allowedOrigins;

    /**
     * @var string $name Human-readable label, e.g. Storefront.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     *   allowedAppIds?: ?array<string>,
     *   allowedOrigins?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->allowedAppIds = $values['allowedAppIds'] ?? null;
        $this->allowedOrigins = $values['allowedOrigins'] ?? null;
        $this->name = $values['name'];
    }
}
