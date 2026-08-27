<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class Subscriber extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<string, mixed> $customAttributes
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var ?string $email Null for phone-only (SMS) contacts, which are identified by their phone number instead.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $emailProvider
     */
    #[JsonProperty('emailProvider')]
    public ?string $emailProvider;

    /**
     * @var ?string $externalId Customer-owned app/customer/user ID for this subscriber
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?string $phone Phone number in E.164 format
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?value-of<SubscriberSmsStatus> $smsStatus SMS marketing consent status, independent of the email status
     */
    #[JsonProperty('smsStatus')]
    public ?string $smsStatus;

    /**
     * @var ?value-of<SubscriberStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?string $timezone IANA timezone identifier used for recipient-local campaign delivery. Null when unknown.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var ?DateTime $unsubscribedAt When the contact opted out, derived from the list memberships the opt-out deactivated. Use this rather than `updatedAt` to date an opt-out - any later tag or attribute write moves `updatedAt`. Null unless the contact is currently unsubscribed, so leaving a single list does not set it, and null for contacts imported as already unsubscribed, where no date exists.
     */
    #[JsonProperty('unsubscribedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $unsubscribedAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
