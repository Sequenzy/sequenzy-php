<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountSuggestionsAcceptResponseResultsItem extends JsonSerializableType
{
    /**
     * @var ?Account $account
     */
    #[JsonProperty('account')]
    public ?Account $account;

    /**
     * @var ?int $contactCount Eligible contacts at the domain (in no account, or already in this one), before the 5,000 member cap.
     */
    #[JsonProperty('contactCount')]
    public ?int $contactCount;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?int $membersAdded
     */
    #[JsonProperty('membersAdded')]
    public ?int $membersAdded;

    /**
     * @var ?value-of<AccountSuggestionsAcceptResponseResultsItemReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<AccountSuggestionsAcceptResponseResultsItemStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $truncated True when contacts were left out because accounts hold at most 5,000 members (the attribute fan-out limit).
     */
    #[JsonProperty('truncated')]
    public ?bool $truncated;

    /**
     * @param array{
     *   account?: ?Account,
     *   contactCount?: ?int,
     *   domain?: ?string,
     *   membersAdded?: ?int,
     *   reason?: ?value-of<AccountSuggestionsAcceptResponseResultsItemReason>,
     *   status?: ?value-of<AccountSuggestionsAcceptResponseResultsItemStatus>,
     *   truncated?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->account = $values['account'] ?? null;
        $this->contactCount = $values['contactCount'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->membersAdded = $values['membersAdded'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->status = $values['status'] ?? null;
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
