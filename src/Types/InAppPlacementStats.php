<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * All-time counts for the in-app items that targeted one placement.
 */
class InAppPlacementStats extends JsonSerializableType
{
    /**
     * @var ?int $clicked Contacts who clicked their item at least once.
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @var ?int $created Items created for contacts.
     */
    #[JsonProperty('created')]
    public ?int $created;

    /**
     * @var ?int $dismissed Contacts who dismissed their item.
     */
    #[JsonProperty('dismissed')]
    public ?int $dismissed;

    /**
     * @var ?int $displayed Contacts who saw their item at least once.
     */
    #[JsonProperty('displayed')]
    public ?int $displayed;

    /**
     * @var ?int $live Contacts with an open item (not dismissed, not expired).
     */
    #[JsonProperty('live')]
    public ?int $live;

    /**
     * @var ?string $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @param array{
     *   clicked?: ?int,
     *   created?: ?int,
     *   dismissed?: ?int,
     *   displayed?: ?int,
     *   live?: ?int,
     *   placement?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicked = $values['clicked'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->dismissed = $values['dismissed'] ?? null;
        $this->displayed = $values['displayed'] ?? null;
        $this->live = $values['live'] ?? null;
        $this->placement = $values['placement'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
