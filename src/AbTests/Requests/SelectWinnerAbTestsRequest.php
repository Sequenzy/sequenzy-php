<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SelectWinnerAbTestsRequest extends JsonSerializableType
{
    /**
     * @var string $variantId Variant to select as the winner.
     */
    #[JsonProperty('variantId')]
    public string $variantId;

    /**
     * @param array{
     *   variantId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->variantId = $values['variantId'];
    }
}
