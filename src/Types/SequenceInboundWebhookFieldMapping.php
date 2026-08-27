<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceInboundWebhookFieldMapping extends JsonSerializableType
{
    /**
     * @var string $email Dot path to the subscriber email in the webhook payload.
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
     * @var ?array<string, string> $properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'string'])]
    public ?array $properties;

    /**
     * @param array{
     *   email: string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   properties?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
