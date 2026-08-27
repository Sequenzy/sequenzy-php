<?php

namespace Sequenzy\Companies\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateCompaniesRequest extends JsonSerializableType
{
    /**
     * @var string $domain Company website domain or URL.
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var ?string $name Company display name. If omitted, Sequenzy derives it from the domain.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   domain: string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domain = $values['domain'];
        $this->name = $values['name'] ?? null;
    }
}
