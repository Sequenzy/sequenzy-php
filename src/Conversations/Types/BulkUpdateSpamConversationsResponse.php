<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class BulkUpdateSpamConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?int $notFound IDs that do not exist in the company.
     */
    #[JsonProperty('notFound')]
    public ?int $notFound;

    /**
     * @var ?array<string> $notFoundIds IDs that do not exist in the company, in request order.
     */
    #[JsonProperty('notFoundIds'), ArrayType(['string'])]
    public ?array $notFoundIds;

    /**
     * @var ?int $requested Distinct conversation IDs in the request.
     */
    #[JsonProperty('requested')]
    public ?int $requested;

    /**
     * @var ?bool $spam
     */
    #[JsonProperty('spam')]
    public ?bool $spam;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $unchanged Conversations that were already there.
     */
    #[JsonProperty('unchanged')]
    public ?int $unchanged;

    /**
     * @var ?array<string> $unchangedIds IDs that were already there, in request order.
     */
    #[JsonProperty('unchangedIds'), ArrayType(['string'])]
    public ?array $unchangedIds;

    /**
     * @var ?int $updated Conversations that moved.
     */
    #[JsonProperty('updated')]
    public ?int $updated;

    /**
     * @var ?array<string> $updatedIds IDs that moved, in request order.
     */
    #[JsonProperty('updatedIds'), ArrayType(['string'])]
    public ?array $updatedIds;

    /**
     * @param array{
     *   notFound?: ?int,
     *   notFoundIds?: ?array<string>,
     *   requested?: ?int,
     *   spam?: ?bool,
     *   success?: ?bool,
     *   unchanged?: ?int,
     *   unchangedIds?: ?array<string>,
     *   updated?: ?int,
     *   updatedIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->notFound = $values['notFound'] ?? null;
        $this->notFoundIds = $values['notFoundIds'] ?? null;
        $this->requested = $values['requested'] ?? null;
        $this->spam = $values['spam'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->unchanged = $values['unchanged'] ?? null;
        $this->unchangedIds = $values['unchangedIds'] ?? null;
        $this->updated = $values['updated'] ?? null;
        $this->updatedIds = $values['updatedIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
