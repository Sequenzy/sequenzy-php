<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SendTestEmailSequencesResponseResultsItem extends JsonSerializableType
{
    /**
     * @var string $emailSendId Durable delivery ID. Use this with GET /email-sends/{emailSendId}.
     */
    #[JsonProperty('emailSendId')]
    public string $emailSendId;

    /**
     * @var string $jobId Legacy queue identifier retained for diagnostics.
     */
    #[JsonProperty('jobId')]
    public string $jobId;

    /**
     * @var string $recipientEmail
     */
    #[JsonProperty('recipientEmail')]
    public string $recipientEmail;

    /**
     * @param array{
     *   emailSendId: string,
     *   jobId: string,
     *   recipientEmail: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->emailSendId = $values['emailSendId'];
        $this->jobId = $values['jobId'];
        $this->recipientEmail = $values['recipientEmail'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
