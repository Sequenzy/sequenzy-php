<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Subscribers\Types\UpdateSubscribersRequestCustomAttributesStrategy;
use Sequenzy\Subscribers\Types\UpdateSubscribersRequestStatus;

class UpdateSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes Custom attributes to update. Defaults to replacing the existing public custom-attribute map.
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var ?value-of<UpdateSubscribersRequestCustomAttributesStrategy> $customAttributesStrategy How to apply customAttributes. replace replaces the existing public custom-attribute map. merge overwrites only provided keys and retains unspecified existing keys.
     */
    #[JsonProperty('customAttributesStrategy')]
    public ?string $customAttributesStrategy;

    /**
     * @var ?string $email New delivery email. Fails with 409 if another subscriber owns it.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId New customer-owned external ID. Fails with 409 if another subscriber owns it.
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
     * @var ?value-of<UpdateSubscribersRequestStatus> $status Setting `unsubscribed` performs a full global unsubscribe.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @param array{
     *   customAttributes?: ?array<string, mixed>,
     *   customAttributesStrategy?: ?value-of<UpdateSubscribersRequestCustomAttributesStrategy>,
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   phoneCountry?: ?string,
     *   smsConsent?: ?bool,
     *   status?: ?value-of<UpdateSubscribersRequestStatus>,
     *   tags?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->customAttributesStrategy = $values['customAttributesStrategy'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->phoneCountry = $values['phoneCountry'] ?? null;
        $this->smsConsent = $values['smsConsent'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }
}
