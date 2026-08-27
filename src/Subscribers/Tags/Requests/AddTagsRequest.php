<?php

namespace Sequenzy\Subscribers\Tags\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AddTagsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes Optional attributes to set on the subscriber if created
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var ?string $email Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId Customer-owned app/customer/user ID
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName First name to set if creating the subscriber.
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName Last name to set if creating the subscriber.
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var string $tag
     */
    #[JsonProperty('tag')]
    public string $tag;

    /**
     * @param array{
     *   tag: string,
     *   customAttributes?: ?array<string, mixed>,
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->tag = $values['tag'];
    }
}
