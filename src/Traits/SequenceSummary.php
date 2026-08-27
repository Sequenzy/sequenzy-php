<?php

namespace Sequenzy\Traits;

use DateTime;
use Sequenzy\Types\SequenceEffectiveStatus;
use Sequenzy\Types\SequenceSummaryPausedByUser;
use Sequenzy\Types\SequenceSendingWindow;
use Sequenzy\Types\SequenceStatus;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Core\Types\Date;

/**
 * @property ?bool $acceptsNewEnrollments
 * @property ?array<string> $bccEmails
 * @property ?DateTime $createdAt
 * @property ?string $description
 * @property ?value-of<SequenceEffectiveStatus> $effectiveStatus
 * @property ?string $effectiveStatusSummary
 * @property ?bool $enrollmentPaused
 * @property ?string $fromEmail
 * @property ?string $fromName
 * @property ?string $id
 * @property ?array<string> $labelIds
 * @property ?array<string> $labels
 * @property ?string $name
 * @property ?DateTime $pausedAt
 * @property ?SequenceSummaryPausedByUser $pausedByUser
 * @property ?string $pausedByUserId
 * @property ?string $pauseReason
 * @property ?string $pauseSource
 * @property ?bool $processesExistingEnrollments
 * @property ?string $replyProfileId
 * @property ?string $replyToEmail
 * @property ?string $replyToName
 * @property ?string $senderProfileId
 * @property ?SequenceSendingWindow $sendingWindow
 * @property ?value-of<SequenceStatus> $status
 * @property ?string $trigger
 * @property ?array<string, mixed> $triggerConfig
 * @property ?DateTime $updatedAt
 * @property ?bool $userCancellable
 */
trait SequenceSummary
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
}
