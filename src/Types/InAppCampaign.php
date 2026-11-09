<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class InAppCampaign extends JsonSerializableType
{
    /**
     * @var ?DateTime $endsAt
     */
    #[JsonProperty('endsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endsAt;

    /**
     * @var ?int $estimatedRecipientCount Contacts who matched the audience at launch.
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
     * @var ?InAppCampaignMessage $message
     */
    #[JsonProperty('message')]
    public ?InAppCampaignMessage $message;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<InAppCampaignPriority> $priority
     */
    #[JsonProperty('priority')]
    public ?string $priority;

    /**
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?DateTime $sentAt When the campaign went live.
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @var ?value-of<InAppCampaignState> $state live is a launched campaign whose end time has not passed; ended is one whose end time has.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?value-of<InAppCampaignStatus> $status Stored status. sent is a launched campaign (live or ended); cancelled is stopped.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string, mixed> $targetLists
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?value-of<InAppCampaignType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   endsAt?: ?DateTime,
     *   estimatedRecipientCount?: ?int,
     *   id?: ?string,
     *   labelIds?: ?array<string>,
     *   message?: ?InAppCampaignMessage,
     *   name?: ?string,
     *   priority?: ?value-of<InAppCampaignPriority>,
     *   scheduledAt?: ?DateTime,
     *   sentAt?: ?DateTime,
     *   state?: ?value-of<InAppCampaignState>,
     *   status?: ?value-of<InAppCampaignStatus>,
     *   targetLists?: ?array<string, mixed>,
     *   type?: ?value-of<InAppCampaignType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->endsAt = $values['endsAt'] ?? null;
        $this->estimatedRecipientCount = $values['estimatedRecipientCount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labelIds = $values['labelIds'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->priority = $values['priority'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
