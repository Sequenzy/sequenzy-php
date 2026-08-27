<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateCompaniesResponse extends JsonSerializableType
{
    /**
     * @var ?CreateCompaniesResponseCompany $company
     */
    #[JsonProperty('company')]
    public ?CreateCompaniesResponseCompany $company;

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
     * @param array{
     *   company?: ?CreateCompaniesResponseCompany,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->company = $values['company'] ?? null;
        $this->message = $values['message'] ?? null;
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
