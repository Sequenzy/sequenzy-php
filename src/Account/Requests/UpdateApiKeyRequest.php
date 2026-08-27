<?php

namespace Sequenzy\Account\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Account\Types\UpdateApiKeyRequestPreset;
use Sequenzy\Core\Types\ArrayType;

class UpdateApiKeyRequest extends JsonSerializableType
{
    /**
     * @var ?string $name New human-readable key name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<UpdateApiKeyRequestPreset> $preset Replacement permission preset. Full-access keys are stored with scopes set to null, meaning all current and future permissions.
     */
    #[JsonProperty('preset')]
    public ?string $preset;

    /**
     * @var ?array<string> $scopes Replacement explicit permission scopes. Overrides preset when provided.
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public ?array $scopes;

    /**
     * @param array{
     *   name?: ?string,
     *   preset?: ?value-of<UpdateApiKeyRequestPreset>,
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
