<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class InputIssue extends JsonSerializableType
{
    /**
     * @var ?array<mixed> $allowedValues Accepted values when the field only takes a fixed set of values.
     */
    #[JsonProperty('allowedValues'), ArrayType(['mixed'])]
    public ?array $allowedValues;

    /**
     * @var string $message What is wrong with the field.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var string $path Dotted field path, such as `audience.subscriberIds[0]`. Empty when the problem is with the request body itself.
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @param array{
     *   message: string,
     *   path: string,
     *   allowedValues?: ?array<mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->allowedValues = $values['allowedValues'] ?? null;
        $this->message = $values['message'];
        $this->path = $values['path'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
