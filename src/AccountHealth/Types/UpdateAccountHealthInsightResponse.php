<?php

namespace Sequenzy\AccountHealth\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountHealthInsight;
use Sequenzy\Core\Json\JsonProperty;

class UpdateAccountHealthInsightResponse extends JsonSerializableType
{
    /**
     * @var ?AccountHealthInsight $insight
     */
    #[JsonProperty('insight')]
    public ?AccountHealthInsight $insight;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   insight?: ?AccountHealthInsight,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->insight = $values['insight'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
