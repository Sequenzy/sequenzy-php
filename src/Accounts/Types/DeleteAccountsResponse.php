<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $deleted
     */
    #[JsonProperty('deleted')]
    public ?bool $deleted;

    /**
     * @var ?int $membersCleared
     */
    #[JsonProperty('membersCleared')]
    public ?int $membersCleared;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   deleted?: ?bool,
     *   membersCleared?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deleted = $values['deleted'] ?? null;
        $this->membersCleared = $values['membersCleared'] ?? null;
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
