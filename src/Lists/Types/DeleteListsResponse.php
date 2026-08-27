<?php

namespace Sequenzy\Lists\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteListsResponse extends JsonSerializableType
{
    /**
     * @var ?int $removedMemberships Number of list memberships removed.
     */
    #[JsonProperty('removedMemberships')]
    public ?int $removedMemberships;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   removedMemberships?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->removedMemberships = $values['removedMemberships'] ?? null;
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
