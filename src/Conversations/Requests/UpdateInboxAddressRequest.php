<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateInboxAddressRequest extends JsonSerializableType
{
    /**
     * @var ?string $domain A verified sending domain of the company, such as `acme.com`. Null to clear.
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
