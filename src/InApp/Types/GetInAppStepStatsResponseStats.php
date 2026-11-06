<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetInAppStepStatsResponseStats extends JsonSerializableType
{
    /**
     * @var ?int $clicked
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @var ?int $created
     */
    #[JsonProperty('created')]
    public ?int $created;

    /**
     * @var ?int $dismissed
     */
    #[JsonProperty('dismissed')]
    public ?int $dismissed;

    /**
     * @var ?int $displayed
     */
    #[JsonProperty('displayed')]
    public ?int $displayed;

    /**
     * @var ?int $pushPermissionDenied Push primers. Contacts who declined, or had notifications turned off.
     */
    #[JsonProperty('pushPermissionDenied')]
    public ?int $pushPermissionDenied;

    /**
     * @var ?int $pushPermissionGranted Push primers. Contacts who allowed notifications (granted, provisional or ephemeral) from this step's message.
     */
    #[JsonProperty('pushPermissionGranted')]
    public ?int $pushPermissionGranted;

    /**
     * @param array{
     *   clicked?: ?int,
     *   created?: ?int,
     *   dismissed?: ?int,
     *   displayed?: ?int,
     *   pushPermissionDenied?: ?int,
     *   pushPermissionGranted?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicked = $values['clicked'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->dismissed = $values['dismissed'] ?? null;
        $this->displayed = $values['displayed'] ?? null;
        $this->pushPermissionDenied = $values['pushPermissionDenied'] ?? null;
        $this->pushPermissionGranted = $values['pushPermissionGranted'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
