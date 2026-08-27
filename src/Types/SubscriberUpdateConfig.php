<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Update Subscriber config. String values may use standalone trigger-event merge tags such as {{event.plan}}, {{event.amount}}, or {{event.active}}. Number and boolean values are coerced after resolution.
 */
class SubscriberUpdateConfig extends JsonSerializableType
{
    /**
     * @var ?array<SubscriberUpdateConfigCustomAttributeUpdatesItem> $customAttributeUpdates
     */
    #[JsonProperty('customAttributeUpdates'), ArrayType([SubscriberUpdateConfigCustomAttributeUpdatesItem::class])]
    public ?array $customAttributeUpdates;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?value-of<SubscriberUpdateConfigStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   customAttributeUpdates?: ?array<SubscriberUpdateConfigCustomAttributeUpdatesItem>,
     *   firstName?: ?string,
     *   label?: ?string,
     *   lastName?: ?string,
     *   status?: ?value-of<SubscriberUpdateConfigStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributeUpdates = $values['customAttributeUpdates'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
