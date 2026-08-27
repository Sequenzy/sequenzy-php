<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Core\Types\Union;

/**
 * Every record must include an email or a phone. Records with only a phone import as phone-only (SMS) contacts.
 */
class SubscriberImportRecord extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt Original signup date on the source platform. Preserves the contact's real history so date-relative segments are correct right after the import. An existing contact's date only ever moves earlier. An unusable value rejects the whole request with a 400 naming the row.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<(
     *    string
     *   |float
     *   |bool
     * )>
     * )|null> $customAttributes
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => new Union(new Union('string', 'float', 'bool', [new Union('string', 'float', 'bool')]), 'null')])]
    public ?array $customAttributes;

    /**
     * @var ?string $email Optional when the record has a phone.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId
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
     * @var ?string $phone Phone number. National-format values use the batch defaultPhoneCountry. Required when the record has no email.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?value-of<SubscriberImportRecordStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?string $timezone IANA timezone identifier (e.g. America/New_York) used for recipient-local campaign delivery. Records with an invalid value import without it.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   customAttributes?: ?array<string, (
     *    string
     *   |float
     *   |bool
     *   |array<(
     *    string
     *   |float
     *   |bool
     * )>
     * )|null>,
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   status?: ?value-of<SubscriberImportRecordStatus>,
     *   tags?: ?array<string>,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
