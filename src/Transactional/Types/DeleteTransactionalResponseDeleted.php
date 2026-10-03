<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteTransactionalResponseDeleted extends JsonSerializableType
{
    /**
     * @var ?bool $emailDeleted True when the content was deleted with the email (code-managed emails, whose content is a snapshot of a real send). False when it was kept as a reusable template.
     */
    #[JsonProperty('emailDeleted')]
    public ?bool $emailDeleted;

    /**
     * @var ?string $emailId The email content kept as a reusable template. Delete it separately with `DELETE /api/v1/templates/{templateId}`. For a code-managed email this id no longer exists; see `emailDeleted`.
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
     *   emailDeleted?: ?bool,
     *   emailId?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   slug?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailDeleted = $values['emailDeleted'] ?? null;
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
