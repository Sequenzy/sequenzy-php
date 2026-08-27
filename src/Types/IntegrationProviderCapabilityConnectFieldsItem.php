<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IntegrationProviderCapabilityConnectFieldsItem extends JsonSerializableType
{
    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<IntegrationProviderCapabilityConnectFieldsItemKey> $key
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?bool $required
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @var ?bool $secret True when the value is a credential and must be handled as a secret.
     */
    #[JsonProperty('secret')]
    public ?bool $secret;

    /**
     * @param array{
     *   description?: ?string,
     *   key?: ?value-of<IntegrationProviderCapabilityConnectFieldsItemKey>,
     *   required?: ?bool,
     *   secret?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->required = $values['required'] ?? null;
        $this->secret = $values['secret'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
