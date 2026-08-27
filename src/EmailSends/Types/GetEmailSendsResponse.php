<?php

namespace Sequenzy\EmailSends\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailSend;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailSendEvent;
use Sequenzy\Core\Types\ArrayType;

class GetEmailSendsResponse extends JsonSerializableType
{
    /**
     * @var ?EmailSend $emailSend
     */
    #[JsonProperty('emailSend')]
    public ?EmailSend $emailSend;

    /**
     * @var ?array<EmailSendEvent> $events
     */
    #[JsonProperty('events'), ArrayType([EmailSendEvent::class])]
    public ?array $events;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?value-of<GetEmailSendsResponseSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   emailSend?: ?EmailSend,
     *   events?: ?array<EmailSendEvent>,
     *   message?: ?string,
     *   source?: ?value-of<GetEmailSendsResponseSource>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailSend = $values['emailSend'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->source = $values['source'] ?? null;
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
