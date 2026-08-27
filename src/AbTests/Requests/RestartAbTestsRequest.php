<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\AbTests\Types\RestartAbTestsRequestTestType;

class RestartAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?string $sourceVariantId Variant ID to use as the new control email. Defaults to the selected winner.
     */
    #[JsonProperty('sourceVariantId')]
    public ?string $sourceVariantId;

    /**
     * @var ?value-of<RestartAbTestsRequestTestType> $testType Test type for generated variants.
     */
    #[JsonProperty('testType')]
    public ?string $testType;

    /**
     * @var ?int $variantCount Total variants including the control.
     */
    #[JsonProperty('variantCount')]
    public ?int $variantCount;

    /**
     * @var ?int $winnerThreshold Subscribers before selecting a winner.
     */
    #[JsonProperty('winnerThreshold')]
    public ?int $winnerThreshold;

    /**
     * @param array{
     *   sourceVariantId?: ?string,
     *   testType?: ?value-of<RestartAbTestsRequestTestType>,
     *   variantCount?: ?int,
     *   winnerThreshold?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sourceVariantId = $values['sourceVariantId'] ?? null;
        $this->testType = $values['testType'] ?? null;
        $this->variantCount = $values['variantCount'] ?? null;
        $this->winnerThreshold = $values['winnerThreshold'] ?? null;
    }
}
