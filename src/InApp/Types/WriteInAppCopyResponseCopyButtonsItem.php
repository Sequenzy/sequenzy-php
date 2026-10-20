<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class WriteInAppCopyResponseCopyButtonsItem extends JsonSerializableType
{
    /**
     * @var ?value-of<WriteInAppCopyResponseCopyButtonsItemAction> $action
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   action?: ?value-of<WriteInAppCopyResponseCopyButtonsItemAction>,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
