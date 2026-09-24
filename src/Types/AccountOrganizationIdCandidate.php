<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AccountOrganizationIdCandidate extends JsonSerializableType
{
    /**
     * @var ?int $accountCount Distinct organizations, the accounts creating would make.
     */
    #[JsonProperty('accountCount')]
    public ?int $accountCount;

    /**
     * @var ?int $eventCount Events carrying the key (`event`) or contacts with the attribute (`attribute`).
     */
    #[JsonProperty('eventCount')]
    public ?int $eventCount;

    /**
     * @var ?array<string> $eventNames Up to 8 event names carrying the key. Empty for attributes.
     */
    #[JsonProperty('eventNames'), ArrayType(['string'])]
    public ?array $eventNames;

    /**
     * @var ?string $nameKey Sibling property with the organization name, when found.
     */
    #[JsonProperty('nameKey')]
    public ?string $nameKey;

    /**
     * @var ?string $propertyKey
     */
    #[JsonProperty('propertyKey')]
    public ?string $propertyKey;

    /**
     * @var ?value-of<AccountOrganizationIdCandidateSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @param array{
     *   accountCount?: ?int,
     *   eventCount?: ?int,
     *   eventNames?: ?array<string>,
     *   nameKey?: ?string,
     *   propertyKey?: ?string,
     *   source?: ?value-of<AccountOrganizationIdCandidateSource>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountCount = $values['accountCount'] ?? null;
        $this->eventCount = $values['eventCount'] ?? null;
        $this->eventNames = $values['eventNames'] ?? null;
        $this->nameKey = $values['nameKey'] ?? null;
        $this->propertyKey = $values['propertyKey'] ?? null;
        $this->source = $values['source'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
