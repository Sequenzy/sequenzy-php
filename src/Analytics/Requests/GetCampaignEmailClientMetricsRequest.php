<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class GetCampaignEmailClientMetricsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset opens.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?string $mailboxProvider Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud).
     */
    public ?string $mailboxProvider;

    /**
     * @param array{
     *   includeMachineEngagement?: ?bool,
     *   mailboxProvider?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
    }
}
