<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteTransactionalResponse extends JsonSerializableType
{
    /**
     * @var ?DeleteTransactionalResponseDeleted $deleted
     */
    #[JsonProperty('deleted')]
    public ?DeleteTransactionalResponseDeleted $deleted;

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
     *   deleted?: ?DeleteTransactionalResponseDeleted,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deleted = $values['deleted'] ?? null;
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
