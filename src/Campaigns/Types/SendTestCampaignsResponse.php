<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SendTestCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?string $emailSendId Durable delivery ID. Use this with GET /email-sends/{emailSendId}.
     */
    #[JsonProperty('emailSendId')]
    public ?string $emailSendId;

    /**
     * @var ?string $jobId Legacy queue identifier retained for response compatibility.
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $recipientEmail
     */
    #[JsonProperty('recipientEmail')]
    public ?string $recipientEmail;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   emailSendId?: ?string,
     *   jobId?: ?string,
     *   message?: ?string,
     *   recipientEmail?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->emailSendId = $values['emailSendId'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->recipientEmail = $values['recipientEmail'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
