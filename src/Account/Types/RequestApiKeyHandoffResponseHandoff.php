<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RequestApiKeyHandoffResponseHandoff extends JsonSerializableType
{
    /**
     * @var ?bool $canSelfServe True when the calling key already holds api_keys:manage and could create the replacement directly.
     */
    #[JsonProperty('canSelfServe')]
    public ?bool $canSelfServe;

    /**
     * @var ?bool $deliversKeyToCaller Always false. The new key is shown in the browser and never returned through this endpoint.
     */
    #[JsonProperty('deliversKeyToCaller')]
    public ?bool $deliversKeyToCaller;

    /**
     * @var ?value-of<RequestApiKeyHandoffResponseHandoffKeyType> $keyType Whether the link targets workspace or account API key settings.
     */
    #[JsonProperty('keyType')]
    public ?string $keyType;

    /**
     * @var ?string $manageUrl The plain API Keys settings URL, without the prefill.
     */
    #[JsonProperty('manageUrl')]
    public ?string $manageUrl;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string, mixed> $permissions Permission receipt for the suggested selection. Null when the request suggested no preset and no scopes, because the form then opens on the dashboard default.
     */
    #[JsonProperty('permissions'), ArrayType(['string' => 'mixed'])]
    public ?array $permissions;

    /**
     * @var ?string $preset
     */
    #[JsonProperty('preset')]
    public ?string $preset;

    /**
     * @var ?RequestApiKeyHandoffResponseHandoffReplaces $replaces The key being replaced. name and prefix are populated only when it is the key making the request.
     */
    #[JsonProperty('replaces')]
    public ?RequestApiKeyHandoffResponseHandoffReplaces $replaces;

    /**
     * @var ?array<string> $scopes
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public ?array $scopes;

    /**
     * @var ?string $url Dashboard URL that opens the create-key form prefilled with the request.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   canSelfServe?: ?bool,
     *   deliversKeyToCaller?: ?bool,
     *   keyType?: ?value-of<RequestApiKeyHandoffResponseHandoffKeyType>,
     *   manageUrl?: ?string,
     *   name?: ?string,
     *   permissions?: ?array<string, mixed>,
     *   preset?: ?string,
     *   replaces?: ?RequestApiKeyHandoffResponseHandoffReplaces,
     *   scopes?: ?array<string>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->canSelfServe = $values['canSelfServe'] ?? null;
        $this->deliversKeyToCaller = $values['deliversKeyToCaller'] ?? null;
        $this->keyType = $values['keyType'] ?? null;
        $this->manageUrl = $values['manageUrl'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->permissions = $values['permissions'] ?? null;
        $this->preset = $values['preset'] ?? null;
        $this->replaces = $values['replaces'] ?? null;
        $this->scopes = $values['scopes'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
