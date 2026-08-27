<?php

namespace Sequenzy\Widgets\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SubmitSavedPopupRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes Subscriber custom attributes for custom fields configured on the popup
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var string $email Subscriber email address
     */
    #[JsonProperty('email')]
    public string $email;

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
     * @var ?string $phone Subscriber phone number in E.164 or US national format, when configured on the popup. Stored on the base subscriber profile and does not grant SMS consent.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $website Honeypot field. Leave empty.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @param array{
     *   email: string,
     *   customAttributes?: ?array<string, mixed>,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   website?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'];
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->website = $values['website'] ?? null;
    }
}
