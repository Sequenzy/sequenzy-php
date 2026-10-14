<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountHealthActionApi extends JsonSerializableType
{
    /**
     * @var ?value-of<AccountHealthActionApiMethod> $method
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   method?: ?value-of<AccountHealthActionApiMethod>,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->method = $values['method'] ?? null;
        $this->path = $values['path'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
