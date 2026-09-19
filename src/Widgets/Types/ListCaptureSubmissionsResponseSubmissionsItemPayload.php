<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListCaptureSubmissionsResponseSubmissionsItemPayload extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $customAttributes
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public array $customAttributes;

    /**
     * @var string $email
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
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?ListCaptureSubmissionsResponseSubmissionsItemPayloadRecovery $recovery Present only for reconstructed historical records. The source is inferred and createdAt is an evidence event time, not a verified submission timestamp.
     */
    #[JsonProperty('recovery')]
    public ?ListCaptureSubmissionsResponseSubmissionsItemPayloadRecovery $recovery;

    /**
     * @param array{
     *   customAttributes: array<string, mixed>,
     *   email: string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   phone?: ?string,
     *   recovery?: ?ListCaptureSubmissionsResponseSubmissionsItemPayloadRecovery,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'];
        $this->email = $values['email'];
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->recovery = $values['recovery'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
