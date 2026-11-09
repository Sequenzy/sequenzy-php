<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class InAppCampaignStats extends JsonSerializableType
{
    /**
     * @var ?array<InAppCampaignStatsButtonsItem> $buttons Custom HTML messages. Contacts per control their first click reported (buttonId).
     */
    #[JsonProperty('buttons'), ArrayType([InAppCampaignStatsButtonsItem::class])]
    public ?array $buttons;

    /**
     * @var ?int $clicked Contacts who clicked it at least once.
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @var ?int $delivered Contacts whose app received the message (fetched it while in the audience).
     */
    #[JsonProperty('delivered')]
    public ?int $delivered;

    /**
     * @var ?int $dismissed
     */
    #[JsonProperty('dismissed')]
    public ?int $dismissed;

    /**
     * @var ?int $displayed Contacts the app showed it to.
     */
    #[JsonProperty('displayed')]
    public ?int $displayed;

    /**
     * @var ?int $pushPermissionDenied
     */
    #[JsonProperty('pushPermissionDenied')]
    public ?int $pushPermissionDenied;

    /**
     * @var ?int $pushPermissionGranted Push primers. Contacts who allowed notifications from the permission button.
     */
    #[JsonProperty('pushPermissionGranted')]
    public ?int $pushPermissionGranted;

    /**
     * @var ?int $totalClicks
     */
    #[JsonProperty('totalClicks')]
    public ?int $totalClicks;

    /**
     * @param array{
     *   buttons?: ?array<InAppCampaignStatsButtonsItem>,
     *   clicked?: ?int,
     *   delivered?: ?int,
     *   dismissed?: ?int,
     *   displayed?: ?int,
     *   pushPermissionDenied?: ?int,
     *   pushPermissionGranted?: ?int,
     *   totalClicks?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttons = $values['buttons'] ?? null;
        $this->clicked = $values['clicked'] ?? null;
        $this->delivered = $values['delivered'] ?? null;
        $this->dismissed = $values['dismissed'] ?? null;
        $this->displayed = $values['displayed'] ?? null;
        $this->pushPermissionDenied = $values['pushPermissionDenied'] ?? null;
        $this->pushPermissionGranted = $values['pushPermissionGranted'] ?? null;
        $this->totalClicks = $values['totalClicks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
