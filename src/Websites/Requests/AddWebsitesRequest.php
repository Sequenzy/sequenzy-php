<?php

namespace Sequenzy\Websites\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AddWebsitesRequest extends JsonSerializableType
{
    /**
     * @var string $domain Domain to add.
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var ?string $mailFromPrefix Bounce (MAIL FROM) subdomain label. Defaults to send. One DNS label of 1 to 63 letters, numbers or hyphens; inbound is reserved. Applies only when the domain is created; re-adding an existing domain returns its stored records.
     */
    #[JsonProperty('mailFromPrefix')]
    public ?string $mailFromPrefix;

    /**
     * @var ?string $trackingPrefix Label of the company tracking domain created on the domain's root (<label>.<root>) when the company has none yet; ignored otherwise. Defaults to links. When the hostname is taken, the label followed by 2 to 5 is tried (for example links2); when none is free, the domain is added without a tracking domain. A label that would land on the bounce hostname returns 400. Change the tracking domain later with PUT /tracking-domain.
     */
    #[JsonProperty('trackingPrefix')]
    public ?string $trackingPrefix;

    /**
     * @param array{
     *   domain: string,
     *   mailFromPrefix?: ?string,
     *   trackingPrefix?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domain = $values['domain'];
        $this->mailFromPrefix = $values['mailFromPrefix'] ?? null;
        $this->trackingPrefix = $values['trackingPrefix'] ?? null;
    }
}
