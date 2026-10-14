<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateInboxAddressRequest extends JsonSerializableType
{
    /**
     * @var ?string $domain One of your receiving domains, by name, such as `acme.com`. For compatibility, the name of a sending domain whose earlier reply setup moved to a receiving domain is also accepted and uses that receiving domain. A verified sending domain with no earlier setup gets its inbound host (usually `inbound.{root}`) added as the workspace's one receiving domain, or fails with 409 `limit_reached` when the workspace already has a different one. Null to clear.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $localPart Name before the @, such as `support`. Letters, numbers, dots, dashes and underscores, starting and ending with a letter or number. Stored in lowercase. Null to clear.
     */
    #[JsonProperty('localPart')]
    public ?string $localPart;

    /**
     * @param array{
     *   domain?: ?string,
     *   localPart?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domain = $values['domain'] ?? null;
        $this->localPart = $values['localPart'] ?? null;
    }
}
