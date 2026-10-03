<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailClientBreakdown;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailClientBreakdownClientsItem;
use Sequenzy\Types\EmailClientBreakdownDevicesItem;

class GetCampaignEmailClientMetricsResponse extends JsonSerializableType
{
    use EmailClientBreakdown;

    /**
     * @var string $campaignId
     */
    #[JsonProperty('campaignId')]
    public string $campaignId;

    /**
     * @var ?string $mailboxProvider Echoed back when `mailboxProvider` is provided.
     */
    #[JsonProperty('mailboxProvider')]
    public ?string $mailboxProvider;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   clients: array<EmailClientBreakdownClientsItem>,
     *   devices: array<EmailClientBreakdownDevicesItem>,
     *   privacyProxyOpens: int,
     *   totalOpens: int,
     *   campaignId: string,
     *   success: bool,
     *   mailboxProvider?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clients = $values['clients'];
        $this->devices = $values['devices'];
        $this->privacyProxyOpens = $values['privacyProxyOpens'];
        $this->totalOpens = $values['totalOpens'];
        $this->campaignId = $values['campaignId'];
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
