<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PreviewCartItemsResponse extends JsonSerializableType
{
    /**
     * @var bool $isSample True for every scenario except real.
     */
    #[JsonProperty('isSample')]
    public bool $isSample;

    /**
     * @var array<PreviewCartItemsResponsePresetsItem> $presets
     */
    #[JsonProperty('presets'), ArrayType([PreviewCartItemsResponsePresetsItem::class])]
    public array $presets;

    /**
     * @var array<array<string, mixed>> $previewItems
     */
    #[JsonProperty('previewItems'), ArrayType([['string' => 'mixed']])]
    public array $previewItems;

    /**
     * @var array<PreviewCartItemsResponsePriceCandidatesItem> $priceCandidates Numeric prices requiring explicit unit selection.
     */
    #[JsonProperty('priceCandidates'), ArrayType([PreviewCartItemsResponsePriceCandidatesItem::class])]
    public array $priceCandidates;

    /**
     * @var value-of<PreviewCartItemsResponseScenario> $scenario
     */
    #[JsonProperty('scenario')]
    public string $scenario;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<PreviewCartItemsResponseSuggestionsItem> $suggestions
     */
    #[JsonProperty('suggestions'), ArrayType([PreviewCartItemsResponseSuggestionsItem::class])]
    public array $suggestions;

    /**
     * @param array{
     *   isSample: bool,
     *   presets: array<PreviewCartItemsResponsePresetsItem>,
     *   previewItems: array<array<string, mixed>>,
     *   priceCandidates: array<PreviewCartItemsResponsePriceCandidatesItem>,
     *   scenario: value-of<PreviewCartItemsResponseScenario>,
     *   success: bool,
     *   suggestions: array<PreviewCartItemsResponseSuggestionsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->isSample = $values['isSample'];
        $this->presets = $values['presets'];
        $this->previewItems = $values['previewItems'];
        $this->priceCandidates = $values['priceCandidates'];
        $this->scenario = $values['scenario'];
        $this->success = $values['success'];
        $this->suggestions = $values['suggestions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
