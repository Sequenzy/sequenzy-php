<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateAttioSettingsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, string> $listMap Complete Sequenzy list id to Attio list UUID or api slug map. Replaces the saved map. Pass {} to clear every mapping.
     */
    #[JsonProperty('listMap'), ArrayType(['string' => 'string'])]
    public ?array $listMap;

    /**
     * @var ?bool $syncCompanyFromDomain When true, upsert a company from the person's non-free-mail email domain.
     */
    #[JsonProperty('syncCompanyFromDomain')]
    public ?bool $syncCompanyFromDomain;

    /**
     * @param array{
     *   listMap?: ?array<string, string>,
     *   syncCompanyFromDomain?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listMap = $values['listMap'] ?? null;
        $this->syncCompanyFromDomain = $values['syncCompanyFromDomain'] ?? null;
    }
}
