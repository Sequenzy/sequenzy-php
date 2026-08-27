<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\SubscriberUpdateConfigCustomAttributeUpdatesItem;
use Sequenzy\Types\SubscriberUpdateConfigStatus;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Update Subscriber config. String values may use standalone trigger-event merge tags such as {{event.plan}}, {{event.amount}}, or {{event.active}}. Number and boolean values are coerced after resolution.
 *
 * @property ?array<SubscriberUpdateConfigCustomAttributeUpdatesItem> $customAttributeUpdates
 * @property ?string $firstName
 * @property ?string $label
 * @property ?string $lastName
 * @property ?value-of<SubscriberUpdateConfigStatus> $status
 */
trait SubscriberUpdateConfig
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
}
