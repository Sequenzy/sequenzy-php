<?php

namespace Sequenzy\Account\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Account\Types\CreateApiKeyRequestPreset;
use Sequenzy\Core\Types\ArrayType;

class CreateApiKeyRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Human-readable key name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<CreateApiKeyRequestPreset> $preset Permission preset to apply when scopes is omitted. Defaults to full_access. Full-access keys are stored with scopes set to null, meaning all current and future permissions.
     */
    #[JsonProperty('preset')]
    public ?string $preset;

    /**
     * @var ?array<string> $scopes Explicit permission scopes for the new key. Overrides preset when provided.
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public ?array $scopes;

    /**
     * @param array{
     *   name?: ?string,
     *   preset?: ?value-of<CreateApiKeyRequestPreset>,
     *   scopes?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->preset = $values['preset'] ?? null;
        $this->scopes = $values['scopes'] ?? null;
    }
}
