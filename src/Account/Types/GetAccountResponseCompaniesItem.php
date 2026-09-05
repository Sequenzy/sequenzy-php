<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetAccountResponseCompaniesItem extends JsonSerializableType
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
     * @var ?value-of<GetAccountResponseCompaniesItemRole> $role Account-key access role. Viewer access remains read-only regardless of key scopes; marketer access is limited to marketing scopes (no transactional, settings, integration, webhook, team, or API-key scopes).
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   role?: ?value-of<GetAccountResponseCompaniesItemRole>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->role = $values['role'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
