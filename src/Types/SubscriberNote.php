<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SubscriberNote extends JsonSerializableType
{
    /**
     * @var ?SubscriberNoteAuthor $author
     */
    #[JsonProperty('author')]
    public ?SubscriberNoteAuthor $author;

    /**
     * @var ?string $authorId
     */
    #[JsonProperty('authorId')]
    public ?string $authorId;

    /**
     * @var ?string $body
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   author?: ?SubscriberNoteAuthor,
     *   authorId?: ?string,
     *   body?: ?string,
     *   companyId?: ?string,
     *   createdAt?: ?DateTime,
     *   id?: ?string,
     *   subscriberId?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->author = $values['author'] ?? null;
        $this->authorId = $values['authorId'] ?? null;
        $this->body = $values['body'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
