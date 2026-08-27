<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetAccountResponse extends JsonSerializableType
{
    /**
     * @var ?GetAccountResponseApiKeyPermissions $apiKeyPermissions Read-only identity and permission metadata for the authenticated key, including a recovery URL. This does not bypass resource scopes.
     */
    #[JsonProperty('apiKeyPermissions')]
    public ?GetAccountResponseApiKeyPermissions $apiKeyPermissions;

    /**
     * @var ?array<GetAccountResponseCompaniesItem> $companies
     */
    #[JsonProperty('companies'), ArrayType([GetAccountResponseCompaniesItem::class])]
    public ?array $companies;

    /**
     * @var ?string $currentCompanyId
     */
    #[JsonProperty('currentCompanyId')]
    public ?string $currentCompanyId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?GetAccountResponseUser $user
     */
    #[JsonProperty('user')]
    public ?GetAccountResponseUser $user;

    /**
     * @param array{
     *   apiKeyPermissions?: ?GetAccountResponseApiKeyPermissions,
     *   companies?: ?array<GetAccountResponseCompaniesItem>,
     *   currentCompanyId?: ?string,
     *   message?: ?string,
     *   success?: ?bool,
     *   user?: ?GetAccountResponseUser,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiKeyPermissions = $values['apiKeyPermissions'] ?? null;
        $this->companies = $values['companies'] ?? null;
        $this->currentCompanyId = $values['currentCompanyId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->user = $values['user'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
