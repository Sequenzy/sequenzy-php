<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateCompaniesResponseCompany extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $websiteUrl
     */
    #[JsonProperty('websiteUrl')]
    public ?string $websiteUrl;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   status?: ?string,
     *   websiteUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->websiteUrl = $values['websiteUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
