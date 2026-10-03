<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SelectWinnerAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $confirmLiveChange Sequence tests only. Required as true when the sequence is active. Campaign tests ignore it.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

    /**
     * @var string $variantId Variant to select as the winner.
     */
    #[JsonProperty('variantId')]
    public string $variantId;

    /**
     * @param array{
     *   variantId: string,
     *   confirmLiveChange?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->variantId = $values['variantId'];
    }
}
