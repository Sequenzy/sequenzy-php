<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The key being replaced. name and prefix are populated only when it is the key making the request.
 */
class RequestApiKeyHandoffResponseHandoffReplaces extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isCurrentKey
     */
    #[JsonProperty('isCurrentKey')]
    public ?bool $isCurrentKey;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $prefix
     */
    #[JsonProperty('prefix')]
    public ?string $prefix;

    /**
     * @param array{
     *   id?: ?string,
     *   isCurrentKey?: ?bool,
     *   name?: ?string,
     *   prefix?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->isCurrentKey = $values['isCurrentKey'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->prefix = $values['prefix'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
