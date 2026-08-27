<?php

namespace Sequenzy\Subscribers\Tags\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RemoveTagsRequest extends JsonSerializableType
{
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
     * @var ?string $firstName First name (used if creating new subscriber)
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName Last name (used if creating new subscriber)
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
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->tag = $values['tag'];
    }
}
