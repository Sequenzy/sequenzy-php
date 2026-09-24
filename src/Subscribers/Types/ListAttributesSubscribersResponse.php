<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListAttributesSubscribersResponse extends JsonSerializableType
{
    /**
     * @var array<ListAttributesSubscribersResponseAttributesItem> $attributes Attributes seen on the sampled contacts, most common first, followed by names only older contacts carry.
     */
    #[JsonProperty('attributes'), ArrayType([ListAttributesSubscribersResponseAttributesItem::class])]
    public array $attributes;

    /**
     * @var int $sampledContacts Recent contacts with custom attributes that were sampled.
     */
    #[JsonProperty('sampledContacts')]
    public int $sampledContacts;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   attributes: array<ListAttributesSubscribersResponseAttributesItem>,
     *   sampledContacts: int,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributes = $values['attributes'];
        $this->sampledContacts = $values['sampledContacts'];
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
