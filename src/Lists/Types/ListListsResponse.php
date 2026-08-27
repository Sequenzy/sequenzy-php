<?php

namespace Sequenzy\Lists\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SubscriberList;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<SubscriberList> $lists
     */
    #[JsonProperty('lists'), ArrayType([SubscriberList::class])]
    public ?array $lists;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   lists?: ?array<SubscriberList>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->lists = $values['lists'] ?? null;
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
