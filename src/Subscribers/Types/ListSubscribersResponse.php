<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SubscriberListPagination;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\Subscriber;
use Sequenzy\Core\Types\ArrayType;

class ListSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?SubscriberListPagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?SubscriberListPagination $pagination;

    /**
     * @var ?array<Subscriber> $subscribers
     */
    #[JsonProperty('subscribers'), ArrayType([Subscriber::class])]
    public ?array $subscribers;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   pagination?: ?SubscriberListPagination,
     *   subscribers?: ?array<Subscriber>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pagination = $values['pagination'] ?? null;
        $this->subscribers = $values['subscribers'] ?? null;
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
