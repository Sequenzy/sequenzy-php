<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SubscriberOperation;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListOperationsSubscribersResponse extends JsonSerializableType
{
    /**
     * @var array<SubscriberOperation> $operations
     */
    #[JsonProperty('operations'), ArrayType([SubscriberOperation::class])]
    public array $operations;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   operations: array<SubscriberOperation>,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->operations = $values['operations'];
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
