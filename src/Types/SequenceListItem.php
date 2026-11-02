<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SequenceSummary;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;

class SequenceListItem extends JsonSerializableType
{
    use SequenceSummary;

    /**
     * @var ?int $emailCount Number of email-sending steps. An A/B test step counts once. Includes steps not yet connected to the flow, so a draft shows every email it has.
     */
    #[JsonProperty('emailCount')]
    public ?int $emailCount;

    /**
     * @param array{
     *   acceptsNewEnrollments?: ?bool,
     *   activeSubscribersOnly?: ?bool,
     *   audienceAutoEnroll?: ?SequenceAudienceAutoEnroll,
     *   bccEmails?: ?array<string>,
     *   createdAt?: ?DateTime,
     *   description?: ?string,
     *   effectiveStatus?: ?value-of<SequenceEffectiveStatus>,
     *   effectiveStatusSummary?: ?string,
     *   enrollmentPaused?: ?bool,
     *   frequencyCapEnabled?: ?bool,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   id?: ?string,
     *   keyDates?: ?SequenceKeyDates,
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
     *   emailCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->acceptsNewEnrollments = $values['acceptsNewEnrollments'] ?? null;
        $this->activeSubscribersOnly = $values['activeSubscribersOnly'] ?? null;
        $this->audienceAutoEnroll = $values['audienceAutoEnroll'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->effectiveStatus = $values['effectiveStatus'] ?? null;
        $this->effectiveStatusSummary = $values['effectiveStatusSummary'] ?? null;
        $this->enrollmentPaused = $values['enrollmentPaused'] ?? null;
        $this->frequencyCapEnabled = $values['frequencyCapEnabled'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->keyDates = $values['keyDates'] ?? null;
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
        $this->emailCount = $values['emailCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
