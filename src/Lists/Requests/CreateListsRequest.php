<?php

namespace Sequenzy\Lists\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateListsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $allowMemberUnsubscribe Allow current private-list members to see its name and opt out in preferences. Defaults false on create; omission preserves on update and false disables. Null is rejected. Stored but has no effect on public lists. Does not permit private joining or rejoining.
     */
    #[JsonProperty('allowMemberUnsubscribe')]
    public ?bool $allowMemberUnsubscribe;

    /**
     * @var ?string $description Optional internal workspace metadata. Never shown in hosted or embedded subscriber preferences.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $isPrivate Set to true to hide the list from subscriber preferences unless allowMemberUnsubscribe is enabled for current members. Public lists expose only their name on that page; descriptions remain internal. List privacy does not override a subscriber's global unsubscribe. Defaults to false when omitted.
     */
    #[JsonProperty('isPrivate')]
    public ?bool $isPrivate;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     *   allowMemberUnsubscribe?: ?bool,
     *   description?: ?string,
     *   isPrivate?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->allowMemberUnsubscribe = $values['allowMemberUnsubscribe'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->isPrivate = $values['isPrivate'] ?? null;
        $this->name = $values['name'];
    }
}
