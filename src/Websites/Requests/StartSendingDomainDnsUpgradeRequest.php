<?php

namespace Sequenzy\Websites\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class StartSendingDomainDnsUpgradeRequest extends JsonSerializableType
{
    /**
     * @var ?string $mailFromPrefix Return-path subdomain label for the new records. Defaults to rp; if rp is taken or already has DNS records, rp1, then sqrp. The SES return path is this label followed by 2 (rp2 by default), moving to bounces or sesbounces if that name is in use; publish the returned names. One DNS label of letters, numbers or hyphens; inbound is not allowed, and a label that already has DNS records, or is the current return path or the tracking domain label, is rejected with 400.
     */
    #[JsonProperty('mailFromPrefix')]
    public ?string $mailFromPrefix;

    /**
     * @param array{
     *   mailFromPrefix?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mailFromPrefix = $values['mailFromPrefix'] ?? null;
    }
}
