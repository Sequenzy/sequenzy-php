<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TransactionalSendDiagnosticsMissingRequiredVariablesItem extends JsonSerializableType
{
    /**
     * @var ?string $lookupName
     */
    #[JsonProperty('lookupName')]
    public ?string $lookupName;

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
     * @var ?array<TransactionalSendDiagnosticsMissingRequiredVariablesItemUsedInItem> $usedIn
     */
    #[JsonProperty('usedIn'), ArrayType([TransactionalSendDiagnosticsMissingRequiredVariablesItemUsedInItem::class])]
    public ?array $usedIn;

    /**
     * @param array{
     *   lookupName?: ?string,
     *   message?: ?string,
     *   name?: ?string,
     *   suggestions?: ?array<string>,
     *   usedIn?: ?array<TransactionalSendDiagnosticsMissingRequiredVariablesItemUsedInItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->lookupName = $values['lookupName'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->suggestions = $values['suggestions'] ?? null;
        $this->usedIn = $values['usedIn'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
