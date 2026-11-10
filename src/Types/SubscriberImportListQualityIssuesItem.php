<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SubscriberImportListQualityIssuesItem extends JsonSerializableType
{
    /**
     * @var value-of<SubscriberImportListQualityIssuesItemKind> $kind undeliverable: addresses that don't exist. disposable: temporary inboxes. role: shared addresses like info@ or sales@.
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var float $rate Share of the list, from 0 to 1.
     */
    #[JsonProperty('rate')]
    public float $rate;

    /**
     * @param array{
     *   kind: value-of<SubscriberImportListQualityIssuesItemKind>,
     *   rate: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->kind = $values['kind'];
        $this->rate = $values['rate'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
