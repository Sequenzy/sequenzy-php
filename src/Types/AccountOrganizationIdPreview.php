<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AccountOrganizationIdPreview extends JsonSerializableType
{
    /**
     * @var ?int $contactCount Contacts that would become members.
     */
    #[JsonProperty('contactCount')]
    public ?int $contactCount;

    /**
     * @var ?string $domain Work email domain most of its contacts share. Personal and disposable providers and your own sending domains are ignored.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $externalId The organization ID, which becomes the account's external ID.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $name The name the account gets. From `nameKey` when set, otherwise from the work email domain most of its contacts share. Null when neither exists.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $sampleEmails Up to 3 of those contacts, those at `domain` first.
     */
    #[JsonProperty('sampleEmails'), ArrayType(['string'])]
    public ?array $sampleEmails;

    /**
     * @param array{
     *   contactCount?: ?int,
     *   domain?: ?string,
     *   externalId?: ?string,
     *   name?: ?string,
     *   sampleEmails?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contactCount = $values['contactCount'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
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
