<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountOrganizationIdPreview;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PreviewFromOrganizationIdAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?array<AccountOrganizationIdPreview> $organizations
     */
    #[JsonProperty('organizations'), ArrayType([AccountOrganizationIdPreview::class])]
    public ?array $organizations;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   organizations?: ?array<AccountOrganizationIdPreview>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->organizations = $values['organizations'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
