<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Company;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListCompaniesResponse extends JsonSerializableType
{
    /**
     * @var ?array<Company> $companies
     */
    #[JsonProperty('companies'), ArrayType([Company::class])]
    public ?array $companies;

    /**
     * @var ?string $currentCompanyId
     */
    #[JsonProperty('currentCompanyId')]
    public ?string $currentCompanyId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   companies?: ?array<Company>,
     *   currentCompanyId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->companies = $values['companies'] ?? null;
        $this->currentCompanyId = $values['currentCompanyId'] ?? null;
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
