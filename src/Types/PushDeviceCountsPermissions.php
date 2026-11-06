<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Active iOS and Android devices by the notification permission the mobile SDK (or an API caller) last reported.
 */
class PushDeviceCountsPermissions extends JsonSerializableType
{
    /**
     * @var ?int $denied
     */
    #[JsonProperty('denied')]
    public ?int $denied;

    /**
     * @var ?int $ephemeral iOS App Clip temporary permission.
     */
    #[JsonProperty('ephemeral')]
    public ?int $ephemeral;

    /**
     * @var ?int $granted
     */
    #[JsonProperty('granted')]
    public ?int $granted;

    /**
     * @var ?int $notDetermined The app has not asked yet.
     */
    #[JsonProperty('notDetermined')]
    public ?int $notDetermined;

    /**
     * @var ?float $optInRate Share of devices with a known permission that can show notifications (granted, provisional or ephemeral), from 0 to 1. Null when none reported one.
     */
    #[JsonProperty('optInRate')]
    public ?float $optInRate;

    /**
     * @var ?int $provisional iOS provisional permission (notifications arrive quietly in Notification Center).
     */
    #[JsonProperty('provisional')]
    public ?int $provisional;

    /**
     * @var ?int $unknown Devices whose SDK version does not report permission.
     */
    #[JsonProperty('unknown')]
    public ?int $unknown;

    /**
     * @param array{
     *   denied?: ?int,
     *   ephemeral?: ?int,
     *   granted?: ?int,
     *   notDetermined?: ?int,
     *   optInRate?: ?float,
     *   provisional?: ?int,
     *   unknown?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->denied = $values['denied'] ?? null;
        $this->ephemeral = $values['ephemeral'] ?? null;
        $this->granted = $values['granted'] ?? null;
        $this->notDetermined = $values['notDetermined'] ?? null;
        $this->optInRate = $values['optInRate'] ?? null;
        $this->provisional = $values['provisional'] ?? null;
        $this->unknown = $values['unknown'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
