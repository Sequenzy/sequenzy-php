<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Personalize as an ad-hoc contact. Mutually exclusive with subscriberId.
 */
class RenderEmailRequestSubscriber extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

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
     * @var ?array<string> $tags Tags this ad-hoc contact carries, used to evaluate tag block conditions. Nothing is stored. Without them a tag condition has no tags to read and renders as false, so only the else branch of a tag split can be previewed. Every other stored-state condition still needs subscriberId.
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @param array{
     *   email: string,
     *   customAttributes?: ?array<string, mixed>,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   tags?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'];
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
