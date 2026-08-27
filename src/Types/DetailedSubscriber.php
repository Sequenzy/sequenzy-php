<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\Subscriber;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;

class DetailedSubscriber extends JsonSerializableType
{
    use Subscriber;

    /**
     * @var ?array<SubscriberActivityEvent> $activity
     */
    #[JsonProperty('activity'), ArrayType([SubscriberActivityEvent::class])]
    public ?array $activity;

    /**
     * @var ?SubscriberEmailStats $emailStats
     */
    #[JsonProperty('emailStats')]
    public ?SubscriberEmailStats $emailStats;

    /**
     * @var ?array<SubscriberListMembership> $lists
     */
    #[JsonProperty('lists'), ArrayType([SubscriberListMembership::class])]
    public ?array $lists;

    /**
     * @var ?array<SubscriberNote> $notes
     */
    #[JsonProperty('notes'), ArrayType([SubscriberNote::class])]
    public ?array $notes;

    /**
     * @var ?array<SubscriberSequenceEnrollment> $sequenceEnrollments
     */
    #[JsonProperty('sequenceEnrollments'), ArrayType([SubscriberSequenceEnrollment::class])]
    public ?array $sequenceEnrollments;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   customAttributes?: ?array<string, mixed>,
     *   email?: ?string,
     *   emailProvider?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   id?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   smsStatus?: ?value-of<SubscriberSmsStatus>,
     *   status?: ?value-of<SubscriberStatus>,
     *   tags?: ?array<string>,
     *   timezone?: ?string,
     *   unsubscribedAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   activity?: ?array<SubscriberActivityEvent>,
     *   emailStats?: ?SubscriberEmailStats,
     *   lists?: ?array<SubscriberListMembership>,
     *   notes?: ?array<SubscriberNote>,
     *   sequenceEnrollments?: ?array<SubscriberSequenceEnrollment>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->emailProvider = $values['emailProvider'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->smsStatus = $values['smsStatus'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->unsubscribedAt = $values['unsubscribedAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->activity = $values['activity'] ?? null;
        $this->emailStats = $values['emailStats'] ?? null;
        $this->lists = $values['lists'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->sequenceEnrollments = $values['sequenceEnrollments'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
