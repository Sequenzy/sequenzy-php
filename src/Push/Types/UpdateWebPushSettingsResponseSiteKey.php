<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Returned when the request sets enabled to true. The active web tracking key web push uses, created for the company website (and its www or apex twin) when the workspace had none. Null when there is no key and the company website is unknown or not a valid origin.
 */
class UpdateWebPushSettingsResponseSiteKey extends JsonSerializableType
{
    /**
     * @var ?array<string> $allowedOrigins
     */
    #[JsonProperty('allowedOrigins'), ArrayType(['string'])]
    public ?array $allowedOrigins;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $installSnippet
     */
    #[JsonProperty('installSnippet')]
    public ?string $installSnippet;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $publicKey
     */
    #[JsonProperty('publicKey')]
    public ?string $publicKey;

    /**
     * @param array{
     *   allowedOrigins?: ?array<string>,
     *   id?: ?string,
     *   installSnippet?: ?string,
     *   name?: ?string,
     *   publicKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowedOrigins = $values['allowedOrigins'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->installSnippet = $values['installSnippet'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publicKey = $values['publicKey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
