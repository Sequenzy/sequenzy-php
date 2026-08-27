<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Subscribers\Types\CreateSubscribersRequestDuplicateStrategy;
use Sequenzy\Subscribers\Types\CreateSubscribersRequestOptInMode;
use Sequenzy\Subscribers\Types\CreateSubscribersRequestStatus;

class CreateSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt Original signup date, for importing history from another platform. Preserves the real date so date-relative segments are correct immediately. An existing contact's date only ever moves earlier, regardless of duplicateStrategy. Supplying this defaults enrollInSequences to false, and updatedAt is never backdated.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<string, mixed> $customAttributes
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * How to handle existing subscribers:
     * - `skip`: Don't update existing subscribers (default)
     * - `merge`: Only fill in missing fields, never overwrite existing values
     * - `overwrite`: Replace all fields (but never reactivate unsubscribed users)
     *
     * @var ?value-of<CreateSubscribersRequestDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?string $email Required when creating a new subscriber unless a phone is provided (which creates a phone-only SMS contact). Optional when externalId identifies an existing subscriber.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?bool $enrollInSequences Whether to enroll the subscriber in matching sequences. Defaults to true for API calls, or to false when createdAt is supplied.
     */
    #[JsonProperty('enrollInSequences')]
    public ?bool $enrollInSequences;

    /**
     * @var ?string $externalId Customer-owned app/customer/user ID. Unique per company when provided.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?array<string> $lists List IDs to add subscriber to. If not provided, a subscriber this call creates follows the workspace default lists setting and an existing subscriber keeps the memberships they already have, so an attribute-only upsert never changes list membership. If empty array, subscriber is added to NO lists.
     */
    #[JsonProperty('lists'), ArrayType(['string'])]
    public ?array $lists;

    /**
     * Consent handling for this request:
     * - `default`: obey the company double opt-in setting for new active subscribers; existing unsubscribed contacts are not sent confirmation email
     * - `confirmed`: create or keep active immediately when you have verified consent
     * - `double_opt_in`: send a confirmation email and keep the contact unsubscribed until they confirm
     *
     * @var ?value-of<CreateSubscribersRequestOptInMode> $optInMode
     */
    #[JsonProperty('optInMode')]
    public ?string $optInMode;

    /**
     * @var ?string $phone Phone number in E.164 format or national format. Stored normalized to E.164. Invalid values fail with a 400 validation error. Does not affect SMS consent. With no email or externalId, creates or matches a phone-only (SMS) contact.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $phoneCountry ISO 3166-1 alpha-2 country used to read a national-format phone, defaulting to US. A parsing hint only - the stored phoneCountry always comes from the parsed number. Sending it without phone fails with a 400 validation error.
     */
    #[JsonProperty('phoneCountry')]
    public ?string $phoneCountry;

    /**
     * @var ?bool $smsConsent SMS marketing consent. true sets smsStatus to subscribed with consent source api, false sets unsubscribed, omitted leaves SMS status unchanged. Never inferred from phone presence.
     */
    #[JsonProperty('smsConsent')]
    public ?bool $smsConsent;

    /**
     * @var ?value-of<CreateSubscribersRequestStatus> $status Initial subscriber status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?string $timezone IANA timezone identifier (e.g. America/New_York) used for recipient-local campaign delivery. Invalid values fail with a 400 validation error; null clears the stored value.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   customAttributes?: ?array<string, mixed>,
     *   duplicateStrategy?: ?value-of<CreateSubscribersRequestDuplicateStrategy>,
     *   email?: ?string,
     *   enrollInSequences?: ?bool,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   lists?: ?array<string>,
     *   optInMode?: ?value-of<CreateSubscribersRequestOptInMode>,
     *   phone?: ?string,
     *   phoneCountry?: ?string,
     *   smsConsent?: ?bool,
     *   status?: ?value-of<CreateSubscribersRequestStatus>,
     *   tags?: ?array<string>,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->enrollInSequences = $values['enrollInSequences'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->lists = $values['lists'] ?? null;
        $this->optInMode = $values['optInMode'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->phoneCountry = $values['phoneCountry'] ?? null;
        $this->smsConsent = $values['smsConsent'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }
}
