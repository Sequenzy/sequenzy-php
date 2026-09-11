<?php

namespace Sequenzy\EmailBlocks\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\EmailBlocks\Types\PreviewCartItemsRequestItemFields;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\EmailBlocks\Types\PreviewCartItemsRequestPriceUnit;
use Sequenzy\EmailBlocks\Types\PreviewCartItemsRequestScenario;

class PreviewCartItemsRequest extends JsonSerializableType
{
    /**
     * @var ?PreviewCartItemsRequestItemFields $itemFields Existing relative dotted paths. Blank values use defaults; unsafe prototype paths are rejected. Suggestions do not replace existing mappings.
     */
    #[JsonProperty('itemFields')]
    public ?PreviewCartItemsRequestItemFields $itemFields;

    /**
     * @var ?array<array<string, mixed>> $items
     */
    #[JsonProperty('items'), ArrayType([['string' => 'mixed']])]
    public ?array $items;

    /**
     * @var ?value-of<PreviewCartItemsRequestPriceUnit> $priceUnit Numeric item prices use cents or explicit major units. The separate total remains in cents.
     */
    #[JsonProperty('priceUnit')]
    public ?string $priceUnit;

    /**
     * @var ?value-of<PreviewCartItemsRequestScenario> $scenario Many returns 12 cloned rows; nonempty sample scenarios use a sample product if items are empty. Real preserves supplied items.
     */
    #[JsonProperty('scenario')]
    public ?string $scenario;

    /**
     * @param array{
     *   itemFields?: ?PreviewCartItemsRequestItemFields,
     *   items?: ?array<array<string, mixed>>,
     *   priceUnit?: ?value-of<PreviewCartItemsRequestPriceUnit>,
     *   scenario?: ?value-of<PreviewCartItemsRequestScenario>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->itemFields = $values['itemFields'] ?? null;
        $this->items = $values['items'] ?? null;
        $this->priceUnit = $values['priceUnit'] ?? null;
        $this->scenario = $values['scenario'] ?? null;
    }
}
