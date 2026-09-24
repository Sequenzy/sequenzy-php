<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AccountSuggestion extends JsonSerializableType
{
    /**
     * @var ?int $contactCount Contacts at the domain. Domains with any contact in an account are not suggested.
     */
    #[JsonProperty('contactCount')]
    public ?int $contactCount;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $name Name the account gets when the suggestion is accepted.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $sampleEmails Up to 10 of those contacts' emails, alphabetical, so you can check who is behind the suggestion.
     */
    #[JsonProperty('sampleEmails'), ArrayType(['string'])]
    public ?array $sampleEmails;

    /**
     * @param array{
     *   contactCount?: ?int,
     *   domain?: ?string,
     *   name?: ?string,
     *   sampleEmails?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contactCount = $values['contactCount'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->sampleEmails = $values['sampleEmails'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
