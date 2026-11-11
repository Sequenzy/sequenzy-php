<?php

namespace Sequenzy\Subscribers\Tags\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RemoveTagsRequest extends JsonSerializableType
{
    /**
     * @var ?string $email Subscriber email. Provide email, externalId, or both.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId Customer-owned app/customer/user ID
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName Updates the matched subscriber's first name. Ignored when no subscriber matches.
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName Updates the matched subscriber's last name. Ignored when no subscriber matches.
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
