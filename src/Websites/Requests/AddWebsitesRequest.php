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
     * @param array{
     *   domain: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domain = $values['domain'];
    }
}
