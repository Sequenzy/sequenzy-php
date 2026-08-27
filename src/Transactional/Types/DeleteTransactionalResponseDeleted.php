<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteTransactionalResponseDeleted extends JsonSerializableType
{
    /**
     * @var ?string $emailId The email content kept as a reusable template. Delete it separately with `DELETE /api/v1/templates/{templateId}`.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

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
     * @var ?string $slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @param array{
     *   emailId?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   slug?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailId = $values['emailId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
