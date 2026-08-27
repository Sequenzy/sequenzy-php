<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UnprocessableEntityErrorBody extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $errors
     */
    #[JsonProperty('errors'), ArrayType([['string' => 'mixed']])]
    public ?array $errors;

    /**
     * @var ?array<string, mixed> $expected
     */
    #[JsonProperty('expected'), ArrayType(['string' => 'mixed'])]
    public ?array $expected;

    /**
     * @var ?array<string, mixed> $found
     */
    #[JsonProperty('found'), ArrayType(['string' => 'mixed'])]
    public ?array $found;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $on
     */
    #[JsonProperty('on')]
    public ?string $on;

    /**
     * @var ?string $property
     */
    #[JsonProperty('property')]
    public ?string $property;

    /**
     * @var ?string $summary
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   errors?: ?array<array<string, mixed>>,
     *   expected?: ?array<string, mixed>,
     *   found?: ?array<string, mixed>,
     *   message?: ?string,
     *   on?: ?string,
     *   property?: ?string,
     *   summary?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->expected = $values['expected'] ?? null;
        $this->found = $values['found'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->on = $values['on'] ?? null;
        $this->property = $values['property'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
