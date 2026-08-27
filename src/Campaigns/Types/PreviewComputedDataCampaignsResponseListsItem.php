<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PreviewComputedDataCampaignsResponseListsItem extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $exposures
     */
    #[JsonProperty('exposures'), ArrayType([['string' => 'mixed']])]
    public ?array $exposures;

    /**
     * @var ?array<array<string, mixed>> $items
     */
    #[JsonProperty('items'), ArrayType([['string' => 'mixed']])]
    public ?array $items;

    /**
     * @var ?string $key
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @param array{
     *   exposures?: ?array<array<string, mixed>>,
     *   items?: ?array<array<string, mixed>>,
     *   key?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->exposures = $values['exposures'] ?? null;
        $this->items = $values['items'] ?? null;
        $this->key = $values['key'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
