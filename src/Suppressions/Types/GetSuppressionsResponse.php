<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetSuppressionsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?GetSuppressionsResponseSuppression $suppression
     */
    #[JsonProperty('suppression')]
    public ?GetSuppressionsResponseSuppression $suppression;

    /**
     * @param array{
     *   success?: ?bool,
     *   suppression?: ?GetSuppressionsResponseSuppression,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->suppression = $values['suppression'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
