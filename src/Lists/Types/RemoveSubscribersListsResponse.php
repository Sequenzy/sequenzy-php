<?php

namespace Sequenzy\Lists\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RemoveSubscribersListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $notFound Emails that did not match any subscriber.
     */
    #[JsonProperty('notFound'), ArrayType(['string'])]
    public ?array $notFound;

    /**
     * @var ?int $removed Number of list memberships removed.
     */
    #[JsonProperty('removed')]
    public ?int $removed;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   notFound?: ?array<string>,
     *   removed?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->notFound = $values['notFound'] ?? null;
        $this->removed = $values['removed'] ?? null;
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
