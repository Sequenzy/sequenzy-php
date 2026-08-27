<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class ListSuppressionsResponseSuppressionsItem extends JsonSerializableType
{
    /**
     * @var ?int $bounceCount
     */
    #[JsonProperty('bounceCount')]
    public ?int $bounceCount;

    /**
     * @var ?string $bounceSubType
     */
    #[JsonProperty('bounceSubType')]
    public ?string $bounceSubType;

    /**
     * @var ?string $bounceType
     */
    #[JsonProperty('bounceType')]
    public ?string $bounceType;

    /**
     * @var ?bool $delistable True only for company-scoped soft-bounce escalations.
     */
    #[JsonProperty('delistable')]
    public ?bool $delistable;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?value-of<ListSuppressionsResponseSuppressionsItemReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<ListSuppressionsResponseSuppressionsItemScope> $scope global blocks every workspace; company blocks only this one.
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @var ?value-of<ListSuppressionsResponseSuppressionsItemSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?DateTime $suppressedAt
     */
    #[JsonProperty('suppressedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $suppressedAt;

    /**
     * @var ?value-of<ListSuppressionsResponseSuppressionsItemSuppressionType> $suppressionType Stable product-level classification independent of provider bounce sub-types.
     */
    #[JsonProperty('suppressionType')]
    public ?string $suppressionType;

    /**
     * @param array{
     *   bounceCount?: ?int,
     *   bounceSubType?: ?string,
     *   bounceType?: ?string,
     *   delistable?: ?bool,
     *   email?: ?string,
     *   reason?: ?value-of<ListSuppressionsResponseSuppressionsItemReason>,
     *   scope?: ?value-of<ListSuppressionsResponseSuppressionsItemScope>,
     *   source?: ?value-of<ListSuppressionsResponseSuppressionsItemSource>,
     *   suppressedAt?: ?DateTime,
     *   suppressionType?: ?value-of<ListSuppressionsResponseSuppressionsItemSuppressionType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounceCount = $values['bounceCount'] ?? null;
        $this->bounceSubType = $values['bounceSubType'] ?? null;
        $this->bounceType = $values['bounceType'] ?? null;
        $this->delistable = $values['delistable'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->suppressedAt = $values['suppressedAt'] ?? null;
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
