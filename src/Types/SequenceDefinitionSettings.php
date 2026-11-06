<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionSettings extends JsonSerializableType
{
    /**
     * @var ?bool $activeSubscribersOnly
     */
    #[JsonProperty('activeSubscribersOnly')]
    public ?bool $activeSubscribersOnly;

    /**
     * @var ?array<string> $bccEmails
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?string $enrollmentFieldPath
     */
    #[JsonProperty('enrollmentFieldPath')]
    public ?string $enrollmentFieldPath;

    /**
     * @var ?value-of<SequenceDefinitionSettingsEnrollmentMode> $enrollmentMode
     */
    #[JsonProperty('enrollmentMode')]
    public ?string $enrollmentMode;

    /**
     * @var ?bool $frequencyCapEnabled
     */
    #[JsonProperty('frequencyCapEnabled')]
    public ?bool $frequencyCapEnabled;

    /**
     * @var ?string $replyProfileId Must be a Reply-To profile in this company.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $senderProfileId Must be a sender profile in this company.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?array<string, mixed> $sendingWindow
     */
    #[JsonProperty('sendingWindow'), ArrayType(['string' => 'mixed'])]
    public ?array $sendingWindow;

    /**
     * @var ?SequenceDefinitionSettingsStopCondition $stopCondition
     */
    #[JsonProperty('stopCondition')]
    public ?SequenceDefinitionSettingsStopCondition $stopCondition;

    /**
     * @var ?bool $userCancellable
     */
    #[JsonProperty('userCancellable')]
    public ?bool $userCancellable;

    /**
     * @param array{
     *   activeSubscribersOnly?: ?bool,
     *   bccEmails?: ?array<string>,
     *   enrollmentFieldPath?: ?string,
     *   enrollmentMode?: ?value-of<SequenceDefinitionSettingsEnrollmentMode>,
     *   frequencyCapEnabled?: ?bool,
     *   replyProfileId?: ?string,
     *   senderProfileId?: ?string,
     *   sendingWindow?: ?array<string, mixed>,
     *   stopCondition?: ?SequenceDefinitionSettingsStopCondition,
     *   userCancellable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeSubscribersOnly = $values['activeSubscribersOnly'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->enrollmentFieldPath = $values['enrollmentFieldPath'] ?? null;
        $this->enrollmentMode = $values['enrollmentMode'] ?? null;
        $this->frequencyCapEnabled = $values['frequencyCapEnabled'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
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
