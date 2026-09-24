<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when `completed`.
 */
class AccountOrganizationIdJobResult extends JsonSerializableType
{
    /**
     * @var ?int $accountsCreated
     */
    #[JsonProperty('accountsCreated')]
    public ?int $accountsCreated;

    /**
     * @var ?int $accountsUpdated Existing accounts that got a name or domain.
     */
    #[JsonProperty('accountsUpdated')]
    public ?int $accountsUpdated;

    /**
     * @var ?int $membershipsCreated
     */
    #[JsonProperty('membershipsCreated')]
    public ?int $membershipsCreated;

    /**
     * @var ?int $membershipsUpdated
     */
    #[JsonProperty('membershipsUpdated')]
    public ?int $membershipsUpdated;

    /**
     * @var ?int $skipped Contacts that no longer exist, or invalid IDs.
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @var ?bool $truncated History was larger than one run covers. Start the job again to continue.
     */
    #[JsonProperty('truncated')]
    public ?bool $truncated;

    /**
     * @param array{
     *   accountsCreated?: ?int,
     *   accountsUpdated?: ?int,
     *   membershipsCreated?: ?int,
     *   membershipsUpdated?: ?int,
     *   skipped?: ?int,
     *   truncated?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountsCreated = $values['accountsCreated'] ?? null;
        $this->accountsUpdated = $values['accountsUpdated'] ?? null;
        $this->membershipsCreated = $values['membershipsCreated'] ?? null;
        $this->membershipsUpdated = $values['membershipsUpdated'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->truncated = $values['truncated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
