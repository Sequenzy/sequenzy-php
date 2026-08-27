<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class SequenceSummary extends JsonSerializableType
{
    /**
     * @var ?bool $acceptsNewEnrollments Whether new subscribers can enter the sequence right now.
     */
    #[JsonProperty('acceptsNewEnrollments')]
    public ?bool $acceptsNewEnrollments;

    /**
     * @var ?array<string> $bccEmails Email addresses blind-copied on every email this sequence sends.
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<SequenceEffectiveStatus> $effectiveStatus
     */
    #[JsonProperty('effectiveStatus')]
    public ?string $effectiveStatus;

    /**
     * @var ?string $effectiveStatusSummary One plain-language sentence describing the run state, safe to show a user verbatim.
     */
    #[JsonProperty('effectiveStatusSummary')]
    public ?string $effectiveStatusSummary;

    /**
     * @var ?bool $enrollmentPaused Whether new enrollments are paused while current recipients continue.
     */
    #[JsonProperty('enrollmentPaused')]
    public ?bool $enrollmentPaused;

    /**
     * @var ?string $fromEmail
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

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
     * @var ?array<string> $labels
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $pausedAt
     */
    #[JsonProperty('pausedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $pausedAt;

    /**
     * @var ?SequenceSummaryPausedByUser $pausedByUser
     */
    #[JsonProperty('pausedByUser')]
    public ?SequenceSummaryPausedByUser $pausedByUser;

    /**
     * @var ?string $pausedByUserId
     */
    #[JsonProperty('pausedByUserId')]
    public ?string $pausedByUserId;

    /**
     * @var ?string $pauseReason
     */
    #[JsonProperty('pauseReason')]
    public ?string $pauseReason;

    /**
     * @var ?string $pauseSource
     */
    #[JsonProperty('pauseSource')]
    public ?string $pauseSource;

    /**
     * @var ?bool $processesExistingEnrollments Whether subscribers already inside the sequence keep advancing and receiving steps.
     */
    #[JsonProperty('processesExistingEnrollments')]
    public ?bool $processesExistingEnrollments;

    /**
     * @var ?string $replyProfileId
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyToEmail
     */
    #[JsonProperty('replyToEmail')]
    public ?string $replyToEmail;

    /**
     * @var ?string $replyToName
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $senderProfileId
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?SequenceSendingWindow $sendingWindow
     */
    #[JsonProperty('sendingWindow')]
    public ?SequenceSendingWindow $sendingWindow;

    /**
     * @var ?value-of<SequenceStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $trigger
     */
    #[JsonProperty('trigger')]
    public ?string $trigger;

    /**
     * @var ?array<string, mixed> $triggerConfig
     */
    #[JsonProperty('triggerConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $triggerConfig;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?bool $userCancellable
     */
    #[JsonProperty('userCancellable')]
    public ?bool $userCancellable;

    /**
     * @param array{
     *   acceptsNewEnrollments?: ?bool,
     *   bccEmails?: ?array<string>,
     *   createdAt?: ?DateTime,
     *   description?: ?string,
     *   effectiveStatus?: ?value-of<SequenceEffectiveStatus>,
     *   effectiveStatusSummary?: ?string,
     *   enrollmentPaused?: ?bool,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   id?: ?string,
     *   labelIds?: ?array<string>,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   pausedAt?: ?DateTime,
     *   pausedByUser?: ?SequenceSummaryPausedByUser,
     *   pausedByUserId?: ?string,
     *   pauseReason?: ?string,
     *   pauseSource?: ?string,
     *   processesExistingEnrollments?: ?bool,
     *   replyProfileId?: ?string,
     *   replyToEmail?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   sendingWindow?: ?SequenceSendingWindow,
     *   status?: ?value-of<SequenceStatus>,
     *   trigger?: ?string,
     *   triggerConfig?: ?array<string, mixed>,
     *   updatedAt?: ?DateTime,
     *   userCancellable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->acceptsNewEnrollments = $values['acceptsNewEnrollments'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->effectiveStatus = $values['effectiveStatus'] ?? null;
        $this->effectiveStatusSummary = $values['effectiveStatusSummary'] ?? null;
        $this->enrollmentPaused = $values['enrollmentPaused'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labelIds = $values['labelIds'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->pausedAt = $values['pausedAt'] ?? null;
        $this->pausedByUser = $values['pausedByUser'] ?? null;
        $this->pausedByUserId = $values['pausedByUserId'] ?? null;
        $this->pauseReason = $values['pauseReason'] ?? null;
        $this->pauseSource = $values['pauseSource'] ?? null;
        $this->processesExistingEnrollments = $values['processesExistingEnrollments'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyToEmail = $values['replyToEmail'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->triggerConfig = $values['triggerConfig'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->userCancellable = $values['userCancellable'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
