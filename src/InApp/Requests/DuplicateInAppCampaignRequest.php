<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DuplicateInAppCampaignRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Name for the copy. Defaults to the source name with " (Copy)".
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
    }
}
