<?php

namespace Sequenzy\Lists\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AddSubscribersListsResponseResultsItem extends JsonSerializableType
{
    /**
     * @var ?bool $addedToList
     */
    #[JsonProperty('addedToList')]
    public ?bool $addedToList;

    /**
     * @var ?bool $created
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?bool $skipped
     */
    #[JsonProperty('skipped')]
    public ?bool $skipped;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $updated
     */
    #[JsonProperty('updated')]
    public ?bool $updated;

    /**
     * @param array{
     *   addedToList?: ?bool,
     *   created?: ?bool,
     *   email?: ?string,
     *   error?: ?string,
     *   skipped?: ?bool,
     *   success?: ?bool,
     *   updated?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addedToList = $values['addedToList'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->updated = $values['updated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
