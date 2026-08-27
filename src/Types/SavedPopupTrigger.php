<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * When the popup opens. Merged key by key into the popup's current trigger.
 */
class SavedPopupTrigger extends JsonSerializableType
{
    /**
     * @var ?string $clickSelector CSS selector of the element that opens the popup. Required when type is click.
     */
    #[JsonProperty('clickSelector')]
    public ?string $clickSelector;

    /**
     * @var ?int $delaySeconds Used when type is delay.
     */
    #[JsonProperty('delaySeconds')]
    public ?int $delaySeconds;

    /**
     * @var ?int $scrollPercent Used when type is scroll.
     */
    #[JsonProperty('scrollPercent')]
    public ?int $scrollPercent;

    /**
     * @var ?value-of<SavedPopupTriggerType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   clickSelector?: ?string,
     *   delaySeconds?: ?int,
     *   scrollPercent?: ?int,
     *   type?: ?value-of<SavedPopupTriggerType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickSelector = $values['clickSelector'] ?? null;
        $this->delaySeconds = $values['delaySeconds'] ?? null;
        $this->scrollPercent = $values['scrollPercent'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
