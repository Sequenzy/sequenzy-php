<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TransactionalSendDiagnosticsUnusedVariablesItem extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $suggestions
     */
    #[JsonProperty('suggestions'), ArrayType(['string'])]
    public ?array $suggestions;

    /**
     * @param array{
     *   message?: ?string,
     *   name?: ?string,
     *   suggestions?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->suggestions = $values['suggestions'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
