<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\Subscriber;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Types\SubscriberSmsStatus;
use Sequenzy\Types\SubscriberStatus;

class CreateSubscribersResponseSubscriber extends JsonSerializableType
{
    use Subscriber;

    /**
     * @var ?bool $created Whether the subscriber was newly created
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?bool $skipped Whether the subscriber was skipped (skip strategy on existing)
     */
    #[JsonProperty('skipped')]
    public ?bool $skipped;

    /**
     * @var ?bool $updated Whether the subscriber was updated (merge/overwrite strategies)
     */
    #[JsonProperty('updated')]
    public ?bool $updated;

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
     *   created?: ?bool,
     *   skipped?: ?bool,
     *   updated?: ?bool,
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
        $this->created = $values['created'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->updated = $values['updated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
