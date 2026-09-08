<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SubscriberOperationResponse extends JsonSerializableType
{
    /**
     * @var SubscriberOperation $operation
     */
    #[JsonProperty('operation')]
    public SubscriberOperation $operation;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   operation: SubscriberOperation,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->operation = $values['operation'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
