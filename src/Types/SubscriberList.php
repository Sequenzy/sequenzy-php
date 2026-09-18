<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SubscriberList extends JsonSerializableType
{
    /**
     * @var ?int $activeSubscriberCount Current list members with status=active. May include phone-only contacts without an email address.
     */
    #[JsonProperty('activeSubscriberCount')]
    public ?int $activeSubscriberCount;

    /**
     * @var ?bool $allowMemberUnsubscribe Whether current members of a private list can see its name and unsubscribe in preferences. Does not allow joining or rejoining. No effect on public lists.
     */
    #[JsonProperty('allowMemberUnsubscribe')]
    public ?bool $allowMemberUnsubscribe;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $description Internal workspace metadata returned only through authenticated list-management surfaces. Never shown in hosted or embedded subscriber preferences.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isPrivate Whether the list is private. Private lists are hidden unless allowMemberUnsubscribe is enabled, in which case current members can see the name and opt out. Private lists cannot be joined through preferences. Descriptions remain internal; global unsubscribe still applies.
     */
    #[JsonProperty('isPrivate')]
    public ?bool $isPrivate;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $subscriberCount Current list members of any status. Memberships with unsubscribedAt set are excluded.
     */
    #[JsonProperty('subscriberCount')]
    public ?int $subscriberCount;

    /**
     * @param array{
     *   activeSubscriberCount?: ?int,
     *   allowMemberUnsubscribe?: ?bool,
     *   createdAt?: ?DateTime,
     *   description?: ?string,
     *   id?: ?string,
     *   isPrivate?: ?bool,
     *   name?: ?string,
     *   subscriberCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeSubscriberCount = $values['activeSubscriberCount'] ?? null;
        $this->allowMemberUnsubscribe = $values['allowMemberUnsubscribe'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isPrivate = $values['isPrivate'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->subscriberCount = $values['subscriberCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
