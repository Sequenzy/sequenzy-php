<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Mail client and device shares of unique opens. Each email send counts once, attributed to the user agent of its first open. Opens through the Gmail and Yahoo image proxies and Apple Mail Privacy Protection report the client with an unknown device.
 */
class EmailClientBreakdown extends JsonSerializableType
{
    /**
     * @var array<EmailClientBreakdownClientsItem> $clients Mail clients, most opens first.
     */
    #[JsonProperty('clients'), ArrayType([EmailClientBreakdownClientsItem::class])]
    public array $clients;

    /**
     * @var array<EmailClientBreakdownDevicesItem> $devices Device types, most opens first.
     */
    #[JsonProperty('devices'), ArrayType([EmailClientBreakdownDevicesItem::class])]
    public array $devices;

    /**
     * @var int $privacyProxyOpens Opens through the Gmail or Yahoo image proxies or Apple Mail Privacy Protection, where the reader's device is unknown.
     */
    #[JsonProperty('privacyProxyOpens')]
    public int $privacyProxyOpens;

    /**
     * @var int $totalOpens Unique opens the breakdown covers. `0` when nothing was opened, in which case `clients` and `devices` are empty.
     */
    #[JsonProperty('totalOpens')]
    public int $totalOpens;

    /**
     * @param array{
     *   clients: array<EmailClientBreakdownClientsItem>,
     *   devices: array<EmailClientBreakdownDevicesItem>,
     *   privacyProxyOpens: int,
     *   totalOpens: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clients = $values['clients'];
        $this->devices = $values['devices'];
        $this->privacyProxyOpens = $values['privacyProxyOpens'];
        $this->totalOpens = $values['totalOpens'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
