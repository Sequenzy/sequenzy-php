<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

class SendingStatusSelfResume extends JsonSerializableType
{
    /**
     * @var ?DateTime $aiReviewedAt
     */
    #[JsonProperty('aiReviewedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $aiReviewedAt;

    /**
     * @var ?string $aiReviewReason
     */
    #[JsonProperty('aiReviewReason')]
    public ?string $aiReviewReason;

    /**
     * @var ?DateTime $aiReviewStartedAt
     */
    #[JsonProperty('aiReviewStartedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $aiReviewStartedAt;

    /**
     * @var ?value-of<SendingStatusSelfResumeAiReviewStatus> $aiReviewStatus State of the automated sender-health review opened when the pause was created.
     */
    #[JsonProperty('aiReviewStatus')]
    public ?string $aiReviewStatus;

    /**
     * @var ?bool $allowedByAdmin
     */
    #[JsonProperty('allowedByAdmin')]
    public ?bool $allowedByAdmin;

    /**
     * @var ?bool $canSelfResume Whether POST /sending-status/resume will succeed right now.
     */
    #[JsonProperty('canSelfResume')]
    public ?bool $canSelfResume;

    /**
     * @var ?bool $ownerIsTrusted
     */
    #[JsonProperty('ownerIsTrusted')]
    public ?bool $ownerIsTrusted;

    /**
     * @var ?bool $supported Whether this pause reason is self-resumable at all.
     */
    #[JsonProperty('supported')]
    public ?bool $supported;

    /**
     * @var ?value-of<SendingStatusSelfResumeUnavailableReason> $unavailableReason The gate blocking resume. Null when resume is available.
     */
    #[JsonProperty('unavailableReason')]
    public ?string $unavailableReason;

    /**
     * @param array{
     *   aiReviewedAt?: ?DateTime,
     *   aiReviewReason?: ?string,
     *   aiReviewStartedAt?: ?DateTime,
     *   aiReviewStatus?: ?value-of<SendingStatusSelfResumeAiReviewStatus>,
     *   allowedByAdmin?: ?bool,
     *   canSelfResume?: ?bool,
     *   ownerIsTrusted?: ?bool,
     *   supported?: ?bool,
     *   unavailableReason?: ?value-of<SendingStatusSelfResumeUnavailableReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->aiReviewedAt = $values['aiReviewedAt'] ?? null;
        $this->aiReviewReason = $values['aiReviewReason'] ?? null;
        $this->aiReviewStartedAt = $values['aiReviewStartedAt'] ?? null;
        $this->aiReviewStatus = $values['aiReviewStatus'] ?? null;
        $this->allowedByAdmin = $values['allowedByAdmin'] ?? null;
        $this->canSelfResume = $values['canSelfResume'] ?? null;
        $this->ownerIsTrusted = $values['ownerIsTrusted'] ?? null;
        $this->supported = $values['supported'] ?? null;
        $this->unavailableReason = $values['unavailableReason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
