<?php

namespace Sequenzy\Account\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Account\Types\RequestApiKeyHandoffRequestPreset;
use Sequenzy\Core\Types\ArrayType;

class RequestApiKeyHandoffRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Suggested name for the new key. Trimmed to 80 characters in the link.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<RequestApiKeyHandoffRequestPreset> $preset Suggested permission preset.
     */
    #[JsonProperty('preset')]
    public ?string $preset;

    /**
     * @var ?string $replaceApiKeyId ID of the key the new one replaces. Pass the literal string "current" for the key making the request.
     */
    #[JsonProperty('replaceApiKeyId')]
    public ?string $replaceApiKeyId;

    /**
     * @var ?array<string> $scopes Suggested explicit permission scopes. Overrides preset when provided.
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public ?array $scopes;

    /**
     * @param array{
     *   name?: ?string,
     *   preset?: ?value-of<RequestApiKeyHandoffRequestPreset>,
     *   replaceApiKeyId?: ?string,
     *   scopes?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->preset = $values['preset'] ?? null;
        $this->replaceApiKeyId = $values['replaceApiKeyId'] ?? null;
        $this->scopes = $values['scopes'] ?? null;
    }
}
