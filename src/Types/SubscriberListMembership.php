<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SubscriberListMembership extends JsonSerializableType
{
    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isPrivate Whether the list is private. Private lists are omitted from the hosted subscriber email preferences/unsubscribe page and cannot be subscribed to or unsubscribed from individually there. List privacy does not override a subscriber's global unsubscribe.
     */
    #[JsonProperty('isPrivate')]
    public ?bool $isPrivate;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $subscribedAt
     */
    #[JsonProperty('subscribedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $subscribedAt;

    /**
     * @var ?DateTime $unsubscribedAt
     */
    #[JsonProperty('unsubscribedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $unsubscribedAt;

    /**
     * @param array{
     *   description?: ?string,
     *   id?: ?string,
     *   isPrivate?: ?bool,
     *   name?: ?string,
     *   subscribedAt?: ?DateTime,
     *   unsubscribedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isPrivate = $values['isPrivate'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->subscribedAt = $values['subscribedAt'] ?? null;
        $this->unsubscribedAt = $values['unsubscribedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
