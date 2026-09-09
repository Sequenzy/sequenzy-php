<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Subscribers\Types\UpdateByExternalIdSubscribersRequestCustomAttributesStrategy;
use Sequenzy\Subscribers\Types\UpdateByExternalIdSubscribersRequestStatus;

class UpdateByExternalIdSubscribersRequest extends JsonSerializableType
{
    /**
     * @var string $externalId External ID. Query form supports IDs containing slashes.
     */
    public string $externalId;

    /**
     * @var ?array<string, mixed> $customAttributes Custom attributes to update. Defaults to replacing the existing public custom-attribute map.
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var ?value-of<UpdateByExternalIdSubscribersRequestCustomAttributesStrategy> $customAttributesStrategy How to apply customAttributes. replace replaces the existing public custom-attribute map. merge overwrites only provided keys and retains unspecified existing keys.
     */
    #[JsonProperty('customAttributesStrategy')]
    public ?string $customAttributesStrategy;

    /**
     * @var ?string $email New delivery email. Fails with 409 if another subscriber owns it.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $newExternalId New external ID. Fails with 409 if another subscriber owns it.
     */
    #[JsonProperty('externalId')]
    public ?string $newExternalId;

    /**
     * @var ?string $firstName Maximum 255 Unicode characters. Excess trailing ASCII spaces are accepted as by PostgreSQL. Longer names return 400 before any changes; correct the name before retrying. Omit to keep unchanged, or send an empty string to clear; null is not accepted.
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName Maximum 255 Unicode characters. Excess trailing ASCII spaces are accepted as by PostgreSQL. Longer names return 400 before any changes; correct the name before retrying. Omit to keep unchanged, or send an empty string to clear; null is not accepted.
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?string $phone Phone number in E.164 format or national format. Stored normalized to E.164. Invalid values fail with a 400 validation error. Does not affect SMS consent. Changing it resets SMS consent unless smsConsent is sent in the same request. null or "" clears the phone, except on a phone-only (SMS) contact, where clearing its only identity fails with a 400 validation error.
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
     * @var ?value-of<UpdateByExternalIdSubscribersRequestStatus> $status Setting `unsubscribed` performs the unsubscribe workflow.
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
     *   externalId: string,
     *   customAttributes?: ?array<string, mixed>,
     *   customAttributesStrategy?: ?value-of<UpdateByExternalIdSubscribersRequestCustomAttributesStrategy>,
     *   email?: ?string,
     *   newExternalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   phoneCountry?: ?string,
     *   smsConsent?: ?bool,
     *   status?: ?value-of<UpdateByExternalIdSubscribersRequestStatus>,
     *   tags?: ?array<string>,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->customAttributesStrategy = $values['customAttributesStrategy'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->newExternalId = $values['newExternalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->phoneCountry = $values['phoneCountry'] ?? null;
        $this->smsConsent = $values['smsConsent'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }
}
