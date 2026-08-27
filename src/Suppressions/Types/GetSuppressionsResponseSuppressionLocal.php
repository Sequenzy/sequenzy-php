<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetSuppressionsResponseSuppressionLocal extends JsonSerializableType
{
    /**
     * @var ?bool $delistable True only for a company-scoped soft-bounce escalation.
     */
    #[JsonProperty('delistable')]
    public ?bool $delistable;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<GetSuppressionsResponseSuppressionLocalScope> $scope global when the block applies platform-wide, company when it is contained to this workspace. Null when the recipient is not locally suppressed.
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @var ?string $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?bool $suppressed
     */
    #[JsonProperty('suppressed')]
    public ?bool $suppressed;

    /**
     * @var ?string $suppressionId
     */
    #[JsonProperty('suppressionId')]
    public ?string $suppressionId;

    /**
     * @var ?value-of<GetSuppressionsResponseSuppressionLocalSuppressionType> $suppressionType Stable product-level classification. Null when no typed local suppression row exists.
     */
    #[JsonProperty('suppressionType')]
    public ?string $suppressionType;

    /**
     * @param array{
     *   delistable?: ?bool,
     *   reason?: ?string,
     *   scope?: ?value-of<GetSuppressionsResponseSuppressionLocalScope>,
     *   source?: ?string,
     *   suppressed?: ?bool,
     *   suppressionId?: ?string,
     *   suppressionType?: ?value-of<GetSuppressionsResponseSuppressionLocalSuppressionType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->delistable = $values['delistable'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->suppressed = $values['suppressed'] ?? null;
        $this->suppressionId = $values['suppressionId'] ?? null;
        $this->suppressionType = $values['suppressionType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
