<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class PushCampaign extends JsonSerializableType
{
    /**
     * @var ?PushCampaignContent $content
     */
    #[JsonProperty('content')]
    public ?PushCampaignContent $content;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?int $estimatedRecipientCount
     */
    #[JsonProperty('estimatedRecipientCount')]
    public ?int $estimatedRecipientCount;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string> $labelIds
     */
    #[JsonProperty('labelIds'), ArrayType(['string'])]
    public ?array $labelIds;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?DateTime $sentAt
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @var ?value-of<PushCampaignStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string, mixed> $targetLists
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?value-of<PushCampaignType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   content?: ?PushCampaignContent,
     *   createdAt?: ?DateTime,
     *   estimatedRecipientCount?: ?int,
     *   id?: ?string,
     *   labelIds?: ?array<string>,
     *   name?: ?string,
     *   scheduledAt?: ?DateTime,
     *   sentAt?: ?DateTime,
     *   status?: ?value-of<PushCampaignStatus>,
     *   targetLists?: ?array<string, mixed>,
     *   type?: ?value-of<PushCampaignType>,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->content = $values['content'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->estimatedRecipientCount = $values['estimatedRecipientCount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labelIds = $values['labelIds'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->type = $values['type'] ?? null;
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
