<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class ScheduleCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ScheduleCampaignsResponseCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ScheduleCampaignsResponseCampaign $campaign;

    /**
     * @var ?string $jobId
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?string $message Scheduling result message. If the campaign requires review, it is held in waiting_approval instead of queueing a send job.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var string $previewUrl
     */
    #[JsonProperty('previewUrl')]
    public string $previewUrl;

    /**
     * @var DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $scheduledAt;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   campaign: ScheduleCampaignsResponseCampaign,
     *   previewUrl: string,
     *   scheduledAt: DateTime,
     *   success: bool,
     *   jobId?: ?string,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->campaign = $values['campaign'];
        $this->jobId = $values['jobId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->previewUrl = $values['previewUrl'];
        $this->scheduledAt = $values['scheduledAt'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
