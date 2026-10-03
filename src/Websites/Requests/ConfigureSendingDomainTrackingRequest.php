<?php

namespace Sequenzy\Websites\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ConfigureSendingDomainTrackingRequest extends JsonSerializableType
{
    /**
     * @var string $trackingPrefix Tracking subdomain label, for example links. One DNS label of 1 to 63 letters, numbers or hyphens; inbound is reserved.
     */
    #[JsonProperty('trackingPrefix')]
    public string $trackingPrefix;

    /**
     * @param array{
     *   trackingPrefix: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->trackingPrefix = $values['trackingPrefix'];
    }
}
