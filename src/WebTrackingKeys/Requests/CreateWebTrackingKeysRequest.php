<?php

namespace Sequenzy\WebTrackingKeys\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateWebTrackingKeysRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $allowedOrigins Origins allowed to use this key. A bare domain is read as https. A leading *. matches subdomains at any depth but not the apex. Omitting this leaves the key unrestricted.
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
     *   allowedOrigins?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->allowedOrigins = $values['allowedOrigins'] ?? null;
        $this->name = $values['name'];
    }
}
