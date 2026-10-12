<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class InAppMessageButtonsItem extends JsonSerializableType
{
    /**
     * @var ?value-of<InAppMessageButtonsItemAction> $action
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $url https URL or app deep link for open_url buttons; null for dismiss.
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
