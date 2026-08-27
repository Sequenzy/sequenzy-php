<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Company;
use Sequenzy\Core\Json\JsonProperty;

class UpdateCompaniesResponse extends JsonSerializableType
{
    /**
     * @var ?Company $company
     */
    #[JsonProperty('company')]
    public ?Company $company;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   company?: ?Company,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->company = $values['company'] ?? null;
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
