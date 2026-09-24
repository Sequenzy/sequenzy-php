<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RequestValidationErrorErrorsItem extends JsonSerializableType
{
    /**
     * @var ?array<mixed> $allowedValues Accepted values when the field takes a fixed set of values.
     */
    #[JsonProperty('allowedValues'), ArrayType(['mixed'])]
    public ?array $allowedValues;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?string $summary
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @param array{
     *   allowedValues?: ?array<mixed>,
     *   message?: ?string,
     *   path?: ?string,
     *   summary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowedValues = $values['allowedValues'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->summary = $values['summary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
