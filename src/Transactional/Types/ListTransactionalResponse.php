<?php

namespace Sequenzy\Transactional\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TransactionalEmailListItem;
use Sequenzy\Core\Types\ArrayType;

class ListTransactionalResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<TransactionalEmailListItem> $transactional
     */
    #[JsonProperty('transactional'), ArrayType([TransactionalEmailListItem::class])]
    public ?array $transactional;

    /**
     * @param array{
     *   success?: ?bool,
     *   transactional?: ?array<TransactionalEmailListItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
