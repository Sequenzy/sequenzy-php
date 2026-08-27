<?php

namespace Sequenzy\Lists\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SubscriberList;
use Sequenzy\Core\Json\JsonProperty;

class CreateListsResponse extends JsonSerializableType
{
    /**
     * @var ?SubscriberList $list
     */
    #[JsonProperty('list')]
    public ?SubscriberList $list;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   list?: ?SubscriberList,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->list = $values['list'] ?? null;
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
