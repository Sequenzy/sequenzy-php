<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Accounts\Types\AccountOrganizationIdKeySource;

class AccountOrganizationIdKey extends JsonSerializableType
{
    /**
     * @var ?string $nameKey Property or attribute holding the organization name. Without it, accounts are named after the work email domain their contacts share.
     */
    #[JsonProperty('nameKey')]
    public ?string $nameKey;

    /**
     * @var string $propertyKey Event property or contact attribute holding your organization ID, such as `workspaceId`. Trimmed.
     */
    #[JsonProperty('propertyKey')]
    public string $propertyKey;

    /**
     * @var ?value-of<AccountOrganizationIdKeySource> $source Where the ID lives.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @param array{
     *   propertyKey: string,
     *   nameKey?: ?string,
     *   source?: ?value-of<AccountOrganizationIdKeySource>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->nameKey = $values['nameKey'] ?? null;
        $this->propertyKey = $values['propertyKey'];
        $this->source = $values['source'] ?? null;
    }
}
