<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class InAppMessageButtonsItem extends JsonSerializableType
{
    /**
     * @var ?value-of<InAppMessageButtonsItemAction> $action request_push_permission: a push primer button. The app asks the OS for notification permission, or opens its notification settings when the contact turned them off, then records a clicked event with pushPermission. Open feeds include such items only when the caller lists the action in actions.
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $url https URL or app deep link for open_url buttons; null otherwise.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   action?: ?value-of<InAppMessageButtonsItemAction>,
     *   label?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
